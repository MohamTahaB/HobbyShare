<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class InvitationsGroupes extends Model
{
    use Notifiable;
    protected $guarded = [];
    public $table="InvitationsGroupes";
    public $timestamps = false;
    protected $primaryKey = 'id_user';
}
