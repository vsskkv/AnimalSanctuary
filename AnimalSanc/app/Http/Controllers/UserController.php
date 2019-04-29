<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('Admin.Users.index', compact('users'));
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
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|max:255',
            'isAdmin' => 'required|numeric',
        ]);
        $user = User::create($validatedData);

        return redirect('/users')->with('success', 'User is successfully saved');
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
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('Admin.Users.edit', compact('user'));
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
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|max:255',
            'isAdmin' => 'required|numeric',
        ]);
        User::whereId($id)->update($validatedData);

        return redirect('/users')->with('success', 'User is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'User is successfully deleted');
    }

    public function getCafes(){
    $users = User::with('petsMethords')
        ->with(['tags' => function( $query ){
            $query->select('tag');
        }])
        ->with('company')
        ->withCount('userLike')
        ->withCount('likes')
        ->where('deleted', '=', 0)
        ->get();
    return response()->json( $users );
  }

  public function getCafe( $slug ){
    $user = User::where('slug', '=', $slug)
        ->with('petsMethords')
        ->withCount('userLike')
        ->with('tags')
        ->with(['company' => function( $query ){
            $query->withCount('users');
        }])
        ->withCount('likes')
        ->where('deleted', '=', 0)
        ->first();
        /*
            If the cafe is not null, return the cafe otherwise return
            a 404 error.
        */
        if( $user != null ){
            return response()->json( $user );
        }else{
            abort(404);
        }
  }
}
