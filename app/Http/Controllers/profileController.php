<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\game;
use App\user_level;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class profileController extends Controller
{
    public function index()
    {   
       $idUser    = Auth::user()->id; 
       $biodata = user_level::where('idUser', $idUser)
					    ->join('Users', 'user_level.idUser', '=', 'Users.id')
					    ->select('user_level.benar','user_level.idUser','user_level.salah','Users.email','user_level.nilai','Users.name')->first();
		


		// if(!$biodata){
		// 	$game = game::max('idGame');
		// 	$biodata = ['name'->'tes'];
		// 	// $biodata [
  //  //          "name"-> 'tes',
  //  //          "title": "X0BmKAydSF",
  //  //          "slug": "vQ3OecHMzJ",
  //  //          "file": "http://localhost:8000/image/1/Cookie.jpg",
  //  //          "konten": "Testing",
  //  //       ]
		// }

        // echo $gameLev->word;

        // if($gameLev > 0){
        //     echo 'hai';
        // }else{
        //     echo 'masih kosong';
        // }
        // // echo $userLevel->idGame;
        // die;

        // $game   = game::where('idGame','=',$idUser)->first();

        return view('profile',['biodata' => $biodata]);
    }

    public function show(profile $profile){

    	return $profile;
    }

}
