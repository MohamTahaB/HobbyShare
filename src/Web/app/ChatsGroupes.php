<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ChatsGroupes extends Model
{
    use Notifiable;

    protected $guarded = [];
    public $table="ChatsGroupes";
    protected $primaryKey = 'id_message';
    public $timestamps = false;
}
