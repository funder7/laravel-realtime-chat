<?php

namespace App\Console\Commands;

use App\Events\NewMessage;
use Illuminate\Console\Command;

use function broadcast;

class ChatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:public-message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a broadcast message to any listening client';

    private function sendMessage(): void {
        $message = $this->ask('Message: ');

        NewMessage::dispatch($message);
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info("  Laravel chat - public message broadcast");
        $this->line('---------------------------------------------');
        $this->newLine();

        $this->sendMessage(); // first is free

        while($this->confirm('Send a public message?', true)) {
            $this->sendMessage(); // others are paid
        }

        $this->newLine(3);
        $this->info("Bye!");
    }
}