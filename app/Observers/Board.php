<?php

namespace App\Observers;

use App\Message;

class Board
{
    public function created($board){
        
        $user = $board->user;
        
        $msg = Message::create([
            'user_id' => 1,
            'to_id' => $user->id,
            'message' => sprintf("Congrats %s! on creating your new bulletin board: [url=%s]%s[/url].\n\n[url=%s]Our Community[/url] is there to help you on this journey plus there are [url=%s]mods and styles[/url] to check out", $user->username, $board->url(), $board->url(), config('app.bburl'), config('app.modsurl'))
        ]);
        
    }
    
    public function deleted($board){
        $board->removeDomain($board->host);
        $board->removeDomains();
        $board->clearData();
    }
}
