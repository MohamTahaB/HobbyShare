<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilActualiteGroupes extends Controller
{

    public function get_fil($id_groupe){
        return \App\FilActualiteGroupes::where('id_groupe','=',$id_groupe)->get()->makeHidden('id_groupe');
    }

    public function generer_fil(){
        /**
         * Il faut faire une requête POST avec pour paramètres
         *  listegroupes[0]:1
        listegroupes[1]:2
        listegroupes[2]:3
         */
        $listeamis=(request('listegroupes'));
        $x=\App\FilActualiteGroupes::where('id_groupe', '=', $listeamis[0]);
        foreach ($listeamis as $value){
            $x=$x->orWhere('id_groupe','=',$value);
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
            'id_groupe' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $save = \App\FilActualiteGroupes::create([
            'id_user' => request('id_user'),
            'id_groupe' => request('id_groupe'),
            'message' => request('message'),
            'envoyele' => Carbon::now()->toDateTimeString()
        ]);
        return $save->id_publication;
    }

    public function remove_message($id_publication){
        $save = \App\FilActualiteGroupes::where('id_publication','=', $id_publication)->first()->delete();
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }

}
