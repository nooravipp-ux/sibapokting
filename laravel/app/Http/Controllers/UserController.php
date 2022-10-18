<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $wilayah = DB::table('pasar')->get();
        $select = DB::table('users')
        ->join('pasar','users.pasar_id','=','pasar.id')
        ->select('users.*','pasar.namapasar')
        ->get();
        //dd($select);
        return view('pages.user',[
            'select' => $select,
            'wilayah' => $wilayah,
            'no' => $no
        ]);
    }

    public function index_user(){
        if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin'){
            $select = DB::table('users')
            ->where('users.id', Auth::user()->id)
            ->get();
        }else{
            $select = DB::table('users')
            ->join('pasar','users.pasar_id','=','pasar.id')
            ->select('users.*','pasar.namapasar')
            ->where('users.id', Auth::user()->id)
            ->get();
        }

        return view('pages.userdetail',[
            'select' => $select
        ]);
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

    public function store(Request $request)
    {
        if($request->akses == 'user' or $request->akses == 'User'){
            DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pass' => $request->password,
            'akses' => $request->akses,
            'pasar_id' => $request->namapasar,
        ]);
        }else{
            DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pass' => $request->password,
            'akses' => $request->akses,
            'pasar_id' => '0'
            ]);
        }
        return redirect()->route('user-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_user(Request $request,$id)
    {
        if($request->password == null){
            DB::table('users')->where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }else{
            DB::table('users')->where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->route('userdetail');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->pasar_id);
        if($request->password == null){
            DB::table('users')->where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'akses' => $request->akses,
                'pasar_id' => $request->pasar_id,
            ]);
        }else{
            DB::table('users')->where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'akses' => $request->akses,
                'password' => Hash::make($request->password),
                'pasar_id' => $request->pasar_id,
            ]);
        }
        return redirect()->route('user-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('user-management.index');
    }
}
