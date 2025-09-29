<?php

namespace BladeEmailer;

use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Events\Dispatcher;

class TemplateManager
{
    private $viewFactory;
    private $templatePath;
    private $cachePath;

    public function __construct(string $templatePath, string $cachePath)
    {
        $this->templatePath = $templatePath;
        $this->cachePath = $cachePath;
        
        $this->initializeBlade();
    }

    private function initializeBlade(): void
    {
        $filesystem = new Filesystem();
        
        // Create view finder
        $viewFinder = new FileViewFinder($filesystem, [$this->templatePath]);
        
        // Create Blade compiler
        $bladeCompiler = new BladeCompiler($filesystem, $this->cachePath);
        
        // Create compiler engine
        $compilerEngine = new CompilerEngine($bladeCompiler, $filesystem);
        
        // Create PHP engine
        $phpEngine = new PhpEngine($filesystem);
        
        // Create engine resolver
        $engineResolver = new \Illuminate\View\Engines\EngineResolver();
        $engineResolver->register('blade', function() use ($compilerEngine) {
            return $compilerEngine;
        });
        $engineResolver->register('php', function() use ($phpEngine) {
            return $phpEngine;
        });
        
        // Create event dispatcher
        $dispatcher = new Dispatcher();
        
        // Create view factory
        $this->viewFactory = new Factory($engineResolver, $viewFinder, $dispatcher);
    }

    public function render(string $template, array $data = []): string
    {
        try {
            return $this->viewFactory->make($template, $data)->render();
        } catch (\Exception $e) {
            throw new \RuntimeException("Failed to render template '{$template}': " . $e->getMessage());
        }
    }

    public function templateExists(string $template): bool
    {
        return $this->viewFactory->exists($template);
    }

    public function getAvailableTemplates(): array
    {
        $templates = [];
        
        if (!is_dir($this->templatePath)) {
            return $templates;
        }
        
        $files = scandir($this->templatePath);
        
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $filename = pathinfo($file, PATHINFO_FILENAME);
                if (substr($filename, -6) === '.blade') {
                    $templateName = str_replace('.blade', '', $filename);
                    $templates[] = $templateName;
                }
            }
        }

        return $templates;
    }

    public function createTemplate(string $name, string $content): bool
    {
        $templatePath = $this->templatePath . '/' . $name . '.blade.php';
        $directory = dirname($templatePath);
        
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        return file_put_contents($templatePath, $content) !== false;
    }

    public function getTemplateContent(string $name): string
    {
        $templatePath = $this->templatePath . '/' . $name . '.blade.php';
        
        if (!file_exists($templatePath)) {
            throw new \RuntimeException("Template '{$name}' not found");
        }

        return file_get_contents($templatePath);
    }

    public function updateTemplate(string $name, string $content): bool
    {
        $templatePath = $this->templatePath . '/' . $name . '.blade.php';
        
        if (!file_exists($templatePath)) {
            throw new \RuntimeException("Template '{$name}' not found");
        }

        return file_put_contents($templatePath, $content) !== false;
    }

    public function deleteTemplate(string $name): bool
    {
        $templatePath = $this->templatePath . '/' . $name . '.blade.php';
        
        if (!file_exists($templatePath)) {
            throw new \RuntimeException("Template '{$name}' not found");
        }

        return unlink($templatePath);
    }
}
