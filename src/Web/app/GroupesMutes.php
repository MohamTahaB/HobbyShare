<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class GroupesMutes extends Model
{
    use Notifiable;
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'id_user';
    public $table="GroupesMutes";
}
