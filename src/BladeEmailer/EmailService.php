<?php

namespace BladeEmailer;

class EmailService
{
    private $emailRunner;
    private $templateManager;

    public function __construct(array $config)
    {
        $templateManager = new TemplateManager(
            $config['templates']['path'],
            $config['templates']['cache']
        );
        
        $this->emailRunner = new EmailRunner($config, $templateManager);
        $this->templateManager = $templateManager;
    }

    public function sendEmail(array $options): bool
    {
        return $this->emailRunner->sendEmail($options);
    }

    public function createTemplate(string $name, string $content): bool
    {
        return $this->templateManager->createTemplate($name, $content);
    }

    public function updateTemplate(string $name, string $content): bool
    {
        return $this->templateManager->updateTemplate($name, $content);
    }

    public function deleteTemplate(string $name): bool
    {
        return $this->templateManager->deleteTemplate($name);
    }

    public function getTemplateContent(string $name): string
    {
        return $this->templateManager->getTemplateContent($name);
    }

    public function getAvailableTemplates(): array
    {
        return $this->templateManager->getAvailableTemplates();
    }

    public function templateExists(string $name): bool
    {
        return $this->templateManager->templateExists($name);
    }

    public function testConnection(): bool
    {
        return $this->emailRunner->testConnection();
    }

    public function getTemplateManager(): TemplateManager
    {
        return $this->templateManager;
    }

    public function getEmailRunner(): EmailRunner
    {
        return $this->emailRunner;
    }
}
