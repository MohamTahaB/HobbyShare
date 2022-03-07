<?php

namespace App\Http\Controllers;

use App\InvitationsAmis;
use App\InvitationsGroupes;
use App\Utilisateurs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Amis extends Controller
{

    /**
     *
     *
     * Ajout/get/suppresion d'un lien d'amitié
     *
     *
     */

    public function get_amis($id)
    {
        return \App\Amis::where('id_1', '=', $id)->get()->makeHidden('id_1');
    }


    public function add_as_friends($id_1,$id_2){
        $save = \App\Amis::create(['id_1' => $id_1, 'id_2' => $id_2]);
        $save = \App\Amis::create(['id_2' => $id_1, 'id_1' => $id_2]);
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }

    public function remove_as_friends($id_1,$id_2){
        $save = \App\Amis::where('id_1','=', $id_1)->where('id_2', '=', $id_2)->first()->delete();
        $save = \App\Amis::where('id_2','=', $id_1)->where('id_1', '=', $id_2)->first()->delete();
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }




    public function login()
    {
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'mail' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $user = Utilisateurs::where('mail', '=', request('mail'))->first();
        if (Hash::check(request('password'), $user->password)) {
            return $user->token;
        }
        return "erreur";
    }

    public function modifier()
    {
        // Mettre à default si on ne veut pas modifier cette valeur
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'nom' => 'required|max:15',
            'prenom' => 'required|max:15',
            'photo' => 'required',
            'description' => 'required',
            'datedenaissance' => 'required',
            'localisation' => 'required',
            'mail' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $user = Utilisateurs::where('mail', '=', request('mail'))->first();
        $liste = array();
        foreach (['nom',
                     'prenom',
                     'photo',
                     'description',
                     'datedenaissance',
                     'localisation',
                     'mail',
                     'password'] as $value) {
            if (request($value) != "default" && $value != "password") {
                $liste[$value]=request($value);
            }
            if($value == "password" && request('value') != 'default'){
                $liste[$value]= Hash::make(request($value));
            }
        }
        $user->update($liste);
        $user->save();
        return "ok";
    }

    public function new_user()
    {
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'nom' => 'required|max:15',
            'prenom' => 'required|max:15',
            'photo' => 'required',
            'description' => 'required',
            'datedenaissance' => 'required',
            'localisation' => 'required',
            'mail' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $token = Str::random(32);
        $save = Utilisateurs::create([
            'nom' => \Illuminate\Support\Facades\Request::get('nom'),
            'prenom' => \Illuminate\Support\Facades\Request::get('prenom'),
            'photo' => \Illuminate\Support\Facades\Request::get('photo'), //renvoyer un lien
            'description' => \Illuminate\Support\Facades\Request::get('description'),
            'datedenaissance' => \Illuminate\Support\Facades\Request::get('datedenaissance'),
            'localisation' => \Illuminate\Support\Facades\Request::get('localisation'),
            'derniereconnexion' => Carbon::now()->toDateString(),
            'status' => '1', // 1 signifie connecté
            'mail' => \Illuminate\Support\Facades\Request::get('mail'),
            'password' => \Illuminate\Support\Facades\Request::get('password'),
            'token' => $token,
            'date_inscription' => Carbon::now()->toDateString()
        ]);
        if (!$save) {
            return "erreur";
        } else {
            return $token;
        }
    }


    /**
     *
     *
     * Invitations
     *
     *
     */

    public function invitations($destinataire)
    {
        return InvitationsAmis::where('id_destinataire', '=', $destinataire)->get()->makeHidden('id_destinataire');
    }

    public function add_invitation($expediteur, $destinataire)
    {
        $save = InvitationsAmis::create(['id_expediteur' => $expediteur, 'id_destinataire' => $destinataire]);
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }

    public function remove_invitation($expediteur, $destinataire)
    {
        $save = InvitationsAmis::where('id_expediteur','=', $expediteur)->where('id_destinataire','=',$destinataire)->first()->delete();
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }


    public function get_all_users()
    {
        return Utilisateurs::all();
    }

    public function get_user($id)
    {
        return Utilisateurs::where('id', '=', $id)->first();
    }


}
