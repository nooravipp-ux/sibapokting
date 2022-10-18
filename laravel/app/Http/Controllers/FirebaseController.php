<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    public function index(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://server-sibapokting.firebaseio.com/')
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('server')->getvalue();

        //dd($ref);
        return view('pages.firebase',[
            'data' => $ref
        ]);
    }

    public function update(Request $request){
        //dd($request->namaserver);
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://server-sibapokting.firebaseio.com/')
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('server')->set($request->namaserver);

        return redirect()->route('firebase');
    }
}
