<?php

namespace App\Auth\Traits;

use App\UserLoginToken;
use Mail;
use App\Mail\MagicLoginRequested;

trait MagicallyAuthenticatable
{
    public function storeToken()
    {
        $this->getToken()->delete();

        $this->getToken()->create([
            'token' => str_random(255),
        ]);

        return $this;
    }

    public function sendMagicLink(array $options)
    {
        Mail::to($this)->send(new MagicLoginRequested($this, $options));
    }

    public function getToken()
    {
        return $this->hasOne(UserLoginToken::class);
    }
}
