<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cardtype extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    protected $primaryKey = 'cardtype_id';
}

