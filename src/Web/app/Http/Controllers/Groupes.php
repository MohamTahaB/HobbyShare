<?php

namespace App\Http\Controllers;

use App\GroupesUtilisateurs;
use App\InvitationsGroupes;
use App\ModerateursParGroupe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Groupes extends Controller
{

    public function get_all(){
        return \App\Groupes::all();
    }

    /**
     *
     *
     * Ajout/update/suppression d'un groupe
     *
     *
     */

    public function add_groupe(){
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'nom' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'localisation' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $save = \App\Groupes::create([
            'nom' => request('nom'),
            'description' => request('description'),
            'photo' => request('photo'),
            'localisation' => request('localisation'),
            'date_creation' => Carbon::now()->toDateString()
        ])->id;
        return $save;
    }


    public function modifier_groupe()
    {
        // Mettre à default si on ne veut pas modifier cette valeur
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'id'=> 'required',
            'nom' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'localisation' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $user = \App\Groupes::where('id','=', request('id'))->first();
        $liste = array();
        foreach (['nom',
                     'description',
                     'photo',
                     'description',
                     'localisation'] as $value) {
            if (request($value) != "default") {
                $liste[$value]=request($value);
            }
        }
        $user->update($liste);
        $user->save();
        return "ok";
    }

    public function remove_groupe($id_groupe){
        $groupe = \App\Groupes::where('id','=',$id_groupe)->delete();
        return "ok";
    }





    public function get_groups_user($iduser){
        return GroupesUtilisateurs::where('id_user','=',$iduser)->get()->makeHidden('id_user');
    }

    public function get_invitations($id_groupe)
    {
        return InvitationsGroupes::where('id_groupe','=',$id_groupe)->get()->makeHidden('id_groupe');
    }

    public function get_moderateurs($id_groupe)
    {
        return ModerateursParGroupe::where('id_groupe','=',$id_groupe)->get()->makeHidden('id_groupe');
    }

    /**
     *
     *
     * Modération
     *
     *
     */

    public function add_moderateur($id_groupe, $id_user)
    {
        $save = ModerateursParGroupe::create(['id_groupe' => $id_groupe, 'id_user' => $id_user]);
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }

    public function remove_moderateur($id_groupe, $id_user)
    {
        $save = ModerateursParGroupe::where('id_groupe','=', $id_groupe)->where('id_user','=',$id_user)->first()->delete();
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }

    /**
     *
     *
     * Ajout/suppression d'un user
     *
     *
     */


    public function add_user($id_groupe, $id_user)
    {
        $save = GroupesUtilisateurs::create(['id_groupe' => $id_groupe, 'id_user' => $id_user]);
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }

    public function remove_user($id_groupe, $id_user)
    {
        $save = GroupesUtilisateurs::where('id_groupe','=', $id_groupe)->where('id_user','=',$id_user)->first()->delete();
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }


    /**
     *
     *
     * Invitations
     *
     *
     */

    public function add_invitation($id_groupe, $id_user)
    {
        $save = InvitationsGroupes::create(['id_groupe' => $id_groupe, 'id_user' => $id_user]);
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }

    public function remove_invitation($id_groupe, $id_user)
    {
        $save = InvitationsGroupes::where('id_groupe','=', $id_groupe)->where('id_user','=',$id_user)->first()->delete();
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }
}
