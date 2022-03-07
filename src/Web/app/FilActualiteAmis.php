<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class FilActualiteAmis extends Model
{
    use Notifiable;

    protected $guarded = [];
    public $timestamps = false;
    public $table="FilActualiteAmis";

    protected $primaryKey = 'id_publication';


}
