<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $pets =\DB::table('pets')->get();
        $pet_adopts =\DB::table('pet_adopts')->get();
        return view('home', compact( 'pets', 'pet_adopts'));
    }

    public function pets(){
        return view('ProductPage.PetsPage');
    }
    public function admin()
    {
        return view('Admin/admin');
    }

    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }

}
