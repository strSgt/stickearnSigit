<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\game;
use App\user_level;
use App\Jawaban;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $idUser    = Auth::user()->id; 
        $userLevel = user_level::where('idUser','=',$idUser)->count();
        if($userLevel <= 0){
            $user_level = new user_level;
            $user_level->idGame = '1';
            $user_level->idUser = $idUser;
            $user_level->benar = '0';
            $user_level->salah = '0';
            $user_level->nilai = '0';
            $user_level->save();
            // echo 'halo';
            
            $userLevel = user_level::where('idUser','=',$idUser)->first();
            $gameId    = $userLevel->idGame;
            $game   = game::where('idGame','=',$gameId)->first();
            return view('home',['game' => $game]);
        }else{
        
            $idUser    = Auth::user()->id; 
            $userLevel = user_level::where('idUser','=',$idUser)->first();
            $gameId    = $userLevel->idGame;

            $game   = game::where('idGame','=',$gameId)->first();

            if(!$game){
                return view('finish');
            }

        // echo $gameLev->word;

        // if($gameLev > 0){
        //     echo 'hai';
        // }else{
        //     echo 'masih kosong';
        // }
        // // echo $userLevel->idGame;
        // die;

        // $game   = game::where('idGame','=',$idUser)->first();

        return view('home',['game' => $game]);
        }
    }

    public function store(Request $request)
    {


        $idUser    = Auth::user()->id; 
        $idGame = $request->idGame;

        $game       = game::where('idGame','=',$idGame)->first();
        $pertanyaan =  strtoupper($game->word);
        $jawaban    = strtoupper($request->jawaban);
        // echo $pertanyaan.' '.$jawaban;
        // die;
        if($jawaban == $pertanyaan){

            $user_level   = user_level::where('idUser','=',$idUser)->first();
            $benar = $user_level->benar + 1;
            $score = $user_level->nilai + 10;
            $nextGame = $idGame + 1;

            // $user_level = user_level::where('idUser','=',$idUser);
            // $user_level->benar = $benar;
            // $user_level->nilai = $score;
            // $user_level->save();
            user_level::where('idUser', $idUser)
                ->update([
                    'benar' => $benar,
                    'nilai' => $score,
                    'idGame' => $nextGame
                ]); 

            $simpan = new jawaban;
            $simpan->idGame = $idGame;
            $simpan->idUser = $idUser;
            $simpan->jawaban = $jawaban;
            $simpan->point = '+10';
            $simpan->save();
           
            $arr = array('msg' => 'Kamu benar!', 'status' => true);
            return Response()->json($arr);
            // return redirect('/home')->with('status','Anda benar!');
        }else{

            $user_level   = user_level::where('idUser','=',$idUser)->first();
            $salah = $user_level->salah + 1;
            $score = $user_level->nilai - 5;
            $nextGame = $idGame + 1;

            // $user_level = user_level::where('idUser','=',$idUser);
            // $user_level->benar = $benar;
            // $user_level->nilai = $score;
            // $user_level->save();
            user_level::where('idUser', $idUser)
                ->update([
                    'salah' => $salah,
                    'nilai' => $score,
                    'idGame' => $nextGame
                ]); 

            $simpan = new jawaban;
            $simpan->idGame = $idGame;
            $simpan->idUser = $idUser;
            $simpan->jawaban = $jawaban;
            $simpan->point = '-5';
            $simpan->save();

            $arr = array('msg' => 'Kamu salah!', 'status' => false);
            return Response()->json($arr);
            // return redirect('/home')->with('status','Anda salah!');
        }
        
        
    }
}
