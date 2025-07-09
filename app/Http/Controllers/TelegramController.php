<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class TelegramController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at')->get();
        return view('chat', compact('messages'));
    }

    public function sendMessage(Request $request)
{
    $text = $request->input('message');

    $botToken = env('TELEGRAM_BOT_TOKEN');
    $chatId = env('TELEGRAM_CHAT_ID');

    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

    $response = Http::post($url, [
        'chat_id' => $chatId,
        'text' => $text
    ]);

    // Optional: Log error if something goes wrong
    if (!$response->successful()) {
        Log::error('Telegram sendMessage failed', [
            'response' => $response->body()
        ]);
    }

    Message::create([
        'from' => 'me',
        'text' => $text
    ]);

    return redirect('/chat');
}


    public function getUpdates()
    {
        $messages = Message::orderBy('created_at')->get();

        return response()->json(['messages' => $messages]);
    }
}

