<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ChatsUtilisateurs extends Model
{
    use Notifiable;
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'id_message';
    public $table="ChatsUtilisateurs";



}
