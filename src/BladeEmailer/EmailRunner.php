<?php

namespace BladeEmailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailRunner
{
    private $config;
    private $templateManager;
    private $mailer;

    public function __construct(array $config, TemplateManager $templateManager)
    {
        $this->config = $config;
        $this->templateManager = $templateManager;
        $this->initializeMailer();
    }

    private function initializeMailer(): void
    {
        $this->mailer = new PHPMailer(true);
        
        // Server settings
        $this->mailer->isSMTP();
        $this->mailer->Host = $this->config['smtp']['host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $this->config['smtp']['username'];
        $this->mailer->Password = $this->config['smtp']['password'];
        $this->mailer->SMTPSecure = $this->config['smtp']['encryption'];
        $this->mailer->Port = $this->config['smtp']['port'];
        $this->mailer->Timeout = $this->config['smtp']['timeout'];
        
        // Character set
        $this->mailer->CharSet = $this->config['defaults']['charset'];
        $this->mailer->Encoding = $this->config['defaults']['encoding'];
        
        // Set default from address
        $this->mailer->setFrom(
            $this->config['from']['email'], 
            $this->config['from']['name']
        );
    }

    public function sendEmail(array $options): bool
    {
        try {
            // Reset mailer for each email
            $this->mailer->clearAddresses();
            $this->mailer->clearAttachments();
            $this->mailer->clearReplyTos();
            $this->mailer->clearAllRecipients();
            
            // Set recipients
            $this->setRecipients($options);
            
            // Set subject
            $this->mailer->Subject = $options['subject'] ?? 'No Subject';
            
            // Set body
            if (isset($options['template'])) {
                $this->setBodyFromTemplate($options);
            } else {
                $this->setBodyFromContent($options);
            }
            
            // Set reply-to if provided
            if (isset($options['reply_to'])) {
                $this->mailer->addReplyTo($options['reply_to']);
            }
            
            // Set CC if provided
            if (isset($options['cc'])) {
                $this->addCC($options['cc']);
            }
            
            // Set BCC if provided
            if (isset($options['bcc'])) {
                $this->addBCC($options['bcc']);
            }
            
            // Add attachments if provided
            if (isset($options['attachments'])) {
                $this->addAttachments($options['attachments']);
            }
            
            // Send email
            return $this->mailer->send();
            
        } catch (Exception $e) {
            throw new \RuntimeException("Failed to send email: " . $e->getMessage());
        }
    }

    private function setRecipients(array $options): void
    {
        if (isset($options['to'])) {
            if (is_string($options['to'])) {
                $this->mailer->addAddress($options['to']);
            } elseif (is_array($options['to'])) {
                foreach ($options['to'] as $email) {
                    if (is_string($email)) {
                        $this->mailer->addAddress($email);
                    } elseif (is_array($email) && isset($email['email'])) {
                        $name = $email['name'] ?? '';
                        $this->mailer->addAddress($email['email'], $name);
                    }
                }
            }
        } else {
            throw new \InvalidArgumentException('Recipient email address is required');
        }
    }

    private function setBodyFromTemplate(array $options): void
    {
        $template = $options['template'];
        $data = $options['data'] ?? [];
        
        if (!$this->templateManager->templateExists($template)) {
            throw new \RuntimeException("Template '{$template}' not found");
        }
        
        // Wrap data in $data array for template access
        $templateData = ['data' => $data];
        $htmlContent = $this->templateManager->render($template, $templateData);
        
        if (isset($options['text_template'])) {
            $textContent = $this->templateManager->render($options['text_template'], $templateData);
            $this->mailer->isHTML(true);
            $this->mailer->Body = $htmlContent;
            $this->mailer->AltBody = $textContent;
        } else {
            $this->mailer->isHTML(true);
            $this->mailer->Body = $htmlContent;
        }
    }

    private function setBodyFromContent(array $options): void
    {
        if (isset($options['html'])) {
            $this->mailer->isHTML(true);
            $this->mailer->Body = $options['html'];
            
            if (isset($options['text'])) {
                $this->mailer->AltBody = $options['text'];
            }
        } elseif (isset($options['text'])) {
            $this->mailer->isHTML(false);
            $this->mailer->Body = $options['text'];
        } else {
            throw new \InvalidArgumentException('Email content is required (html, text, or template)');
        }
    }

    private function addCC($cc): void
    {
        if (is_string($cc)) {
            $this->mailer->addCC($cc);
        } elseif (is_array($cc)) {
            foreach ($cc as $email) {
                $this->mailer->addCC($email);
            }
        }
    }

    private function addBCC($bcc): void
    {
        if (is_string($bcc)) {
            $this->mailer->addBCC($bcc);
        } elseif (is_array($bcc)) {
            foreach ($bcc as $email) {
                $this->mailer->addBCC($email);
            }
        }
    }

    private function addAttachments(array $attachments): void
    {
        foreach ($attachments as $attachment) {
            if (is_string($attachment)) {
                $this->mailer->addAttachment($attachment);
            } elseif (is_array($attachment)) {
                $path = $attachment['path'] ?? '';
                $name = $attachment['name'] ?? basename($path);
                $encoding = $attachment['encoding'] ?? 'base64';
                $type = $attachment['type'] ?? '';
                
                $this->mailer->addAttachment($path, $name, $encoding, $type);
            }
        }
    }

    public function getTemplateManager(): TemplateManager
    {
        return $this->templateManager;
    }

    public function testConnection(): bool
    {
        try {
            $this->mailer->smtpConnect();
            $this->mailer->smtpClose();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
