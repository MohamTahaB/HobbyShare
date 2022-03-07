<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupesMutes extends Controller
{

    public function get_mutes_groupes($id_user){
        return \App\GroupesMutes::where('id_user','=',$id_user);
    }

    public function add_user($id_groupe, $id_user)
    {
        $save = \App\GroupesMutes::create(['id_groupe' => $id_groupe, 'id_user' => $id_user]);
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }

    public function remove_user($id_groupe, $id_user)
    {
        $save = \App\GroupesMutes::where('id_groupe','=', $id_groupe)->where('id_user','=',$id_user)->first()->delete();
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }



}
