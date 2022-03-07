<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatsUtilisateurs extends Controller
{

    public function get_messages($id_exp, $id_dest){
        return \App\ChatsUtilisateurs::where([['id_expediteur', '=', $id_exp],['id_destinataire', '=', $id_dest] ])->orWhere([['id_expediteur', '=', $id_dest],['id_destinataire', '=', $id_exp] ])->get();
    }

    public function add_message()
    {
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'id_expediteur' => 'required',
            'id_destinataire' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $save = \App\ChatsUtilisateurs::create([
            'id_expediteur' => request('id_expediteur'),
            'id_destinataire' => request('id_destinataire'),
            'message' => request('message'),
            'envoyele' => Carbon::now()->toDateTimeString()
        ]);
        return $save->id_message;
    }

    public function remove_message($id_message)
    {
        $save = \App\ChatsUtilisateurs::where('id_message','=', $id_message)->first()->delete();
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }


}
