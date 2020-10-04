<?php

namespace App\Observers;

use App\Message;

class User
{
    public function created($user){
        $msg = Message::create([
            'user_id' => 1,
            'to_id' => $user->id,
            'title' => 'Thanks For Choosing Our Service',
            'message' => sprintf("Hey there %s!\n\nThanks for choosing our service. You may need to verify your email if you haven't done so.\nClick [url=%s]here[/url] to join our community, where tips and tricks to using our service is shared :).", $user->username, config('app.bburl'))
        ]);
        
        $user->mail($msg->title, $msg->message);
    }
}
