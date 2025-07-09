@extends('layouts.app')

@push('styles')
<style>
    .message.user {
        text-align: right;
        background: #d1e7dd;
        padding: 5px;
        margin: 5px;
    }

    .message.bot {
        text-align: left;
        background: #f8d7da;
        padding: 5px;
        margin: 5px;
    }
</style>

@endpush




@section('content')
<div id="chatBox">
    @foreach($messages as $msg)
        <div class="message {{ $msg->from == 'me' ? 'user' : 'bot' }}">
            {{ $msg->text }}
        </div>
    @endforeach
</div>

<form action="{{ url('/send-message') }}" method="POST">
    @csrf
    <input type="text" name="message" required placeholder="Tulis pesan...">
    <button type="submit">Kirim</button>
</form>
@endsection
