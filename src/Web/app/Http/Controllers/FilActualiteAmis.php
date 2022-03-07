<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilActualiteAmis extends Controller
{

    public function generer_fil(){
        /**
         * Il faut faire une requête POST avec pour paramètres
         *  listeamis[0]:1
            listeamis[1]:2
            listeamis[2]:3
         */
        $listeamis=(request('listeamis'));
        $x=\App\FilActualiteAmis::where('id_user', '=', $listeamis[0]);
        foreach ($listeamis as $value){
            $x=$x->orWhere('id_user','=',$value);
        }
        $nontrie= $x->get();
        $sorted = $nontrie->sortBy(function($post)
        {
            return Carbon::createFromFormat('Y-m-d h:m:s', $post->envoyele)->format('d-m-Y h:m:s');
        });
        return $sorted;
    }

    public function add_message(){
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'id_user' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $save = \App\FilActualiteAmis::create([
            'id_user' => request('id_user'),
            'message' => request('message'),
            'envoyele' => Carbon::now()->toDateTimeString()
        ]);
        return $save->id_publication;
    }

    public function remove_message($id_publication){
        $save = \App\FilActualiteAmis::where('id_publication','=', $id_publication)->first()->delete();
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }



}
