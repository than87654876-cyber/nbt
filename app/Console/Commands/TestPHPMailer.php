<?php

namespace App\Console\Commands;

use App\Services\PHPMailerService;
use Illuminate\Console\Command;

class TestPHPMailer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test-phpmailer {email : The email address of the recipient} {--subject=Test Email from PHPMailer : The subject of the email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test email using PHPMailer and the SMTP settings from .env';

    /**
     * Execute the console command.
     */
    public function handle(PHPMailerService $mailerService)
    {
        $email = $this->argument('email');
        $subject = $this->option('subject');
        
        $this->info("Sending test email using PHPMailer to: {$email}...");

        $body = "<h1>PHPMailer SMTP Test Success</h1>
                 <p>This is a test email sent using the new <code>PHPMailerService</code> integrated with SMTP credentials configured in your <code>.env</code> file.</p>
                 <p>Timestamp: " . now()->toDateTimeString() . "</p>";

        $success = $mailerService->send($email, $subject, $body);

        if ($success) {
            $this->info("Success! The test email has been sent successfully.");
            return 0;
        } else {
            $this->error("Failed! Check Laravel logs or console errors for details.");
            return 1;
        }
    }
}
