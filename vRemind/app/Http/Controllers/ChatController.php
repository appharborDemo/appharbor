<?php

class ChatController extends \BaseController
{

    public function sendMessage()
    {
        $username = Input::get('username');
        $text = Input::get('text');

        $chatMessage = new ChatMessage();
        $chatMessage->sender_username = $username;
        $chatMessage->message = $text;
        $chatMessage->save();
    }

    public function isTyping()
    {
        $username = Input::get('username');

        $chat = Chat::find(1);
        if ($chat->user1 == $username)
            $chat->user1_is_typing = true;
        else
            $chat->user2_is_typing = true;
        $chat->save();
    }

    public function notTyping()
    {
        $username = Input::get('username');

        $chat = Chat::find(1);
        if ($chat->user1 == $username)
            $chat->user1_is_typing = false;
        else
            $chat->user2_is_typing = false;
        $chat->save();
    }

    public function retrieveChatMessages()
    {
        $username = Input::get('username');

        $message = ChatMessage::where('sender_username', '!=', $username)->where('read', '=', false)->first();

        if (count($message) > 0)
        {
            $message->read = true;
            $message->save();
            return $message->message;
        }
    }

    public function retrieveTypingStatus()
    {
        $username = Input::get('username');

        $chat = Chat::find(1);
        if ($chat->user1 == $username)
        {
            if ($chat->user2_is_typing)
                return $chat->user2;
        }
        else
        {
            if ($chat->user1_is_typing)
                return $chat->user1;
        }
    }
}