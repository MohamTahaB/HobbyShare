<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class InvitationsAmis extends Model
{
    use Notifiable;
    protected $guarded = [];
    public $table="InvitationsAmis";
    public $timestamps = false;
    protected $primaryKey = 'id_expediteur';

}
