<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Message;

class SyncTelegramMessages extends Command
{
    protected $signature = 'telegram:sync';
    protected $description = 'Sync messages from Telegram bot to local database';

    public function handle()
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $url = "https://api.telegram.org/bot{$botToken}/getUpdates";

        $response = Http::get($url);
        $data = $response->json();

        $new = 0;

        foreach ($data['result'] ?? [] as $update) {
            if (!isset($update['message'])) continue;

            $text = $update['message']['text'] ?? '';
            $isBot = $update['message']['from']['is_bot'] ?? false;

            // Prevent duplicates
            $exists = Message::where('text', $text)
                ->where('from', $isBot ? 'me' : 'bot')
                ->exists();

            if (!$exists) {
                Message::create([
                    'from' => $isBot ? 'me' : 'bot',
                    'text' => $text
                ]);
                $new++;
            }
        }

        $this->info("Synced {$new} new message(s).");
    }
}
