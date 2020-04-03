<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\user_level;
use App\jawaban;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminHomeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $id = 1;
        // $jb = user::with(['user_level'])->get();
             // ->join('user_level', 'users.id', '=', 'user_level.idUser');
            // ->select('user_level.benar','user_level.salah','user_level.nilai','users.email')->get(); 
            // 
        $query = DB::table('Users')
            ->select('Users.id','Users.name','users.email','user_level.benar','user_level.salah','user_level.nilai')
            ->join('user_level', 'users.id', '=', 'user_level.idUser')
            ->get();
        return view('admin',['query' => $query]);
        // return view('admin',['jb' => $jb]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $query = User::where('id','=',$id)
            ->join('user_level', 'users.id', '=', 'user_level.idUser')
            ->select('Users.id','Users.name','users.email','user_level.benar','user_level.salah','user_level.nilai')->first();;   
        return view('adminUpdate',['query' => $query]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $query)
    {
    //     echo $request->name;
    //     die;
        user_level::where('idUser', $query)
                ->update([
                    'nilai' => $request->nilai,
                    'benar' => $request->benar,
                    'salah' => $request->salah
                ]); 
        user::where('id', $query)
                ->update([
                    'password' => Hash::make($request->password),
                    'name' => $request->name,
                    'email' => $request->email
                ]); 
        
        $query = DB::table('Users')
            ->select('Users.id','Users.name','users.email','user_level.benar','user_level.salah','user_level.nilai')
            ->join('user_level', 'users.id', '=', 'user_level.idUser')
            ->get();
        return view('admin',['query' => $query]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }

    public function delete($id)
    {
         DB::table('users')->where('id', '=', $id)->delete();

        $query = DB::table('Users')
            ->select('Users.id','Users.name','users.email','user_level.benar','user_level.salah','user_level.nilai')
            ->join('user_level', 'users.id', '=', 'user_level.idUser')
            ->get();
        return view('admin',['query' => $query]);
    }
}
