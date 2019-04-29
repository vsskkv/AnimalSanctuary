<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PetAdopt;

class PetAdoptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pet_adopts = PetAdopt::all();

        return view('Pets.PetsAdopt.indexAdopt', compact('pet_adopts'));
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
        $validatedData = $request->validate([
         'pet' => 'required|max:255',
         'user' => 'required|max:255',
         'adopted' => 'required|numeric',
     ]);
     $pet_adopt = PetAdopt::create($validatedData);

     return redirect('/pet_adopts')->with('success', 'Pet and user are successfully saved');
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
        //
        $pet_adopt = \DB::table('pet_adopts')->where('id', $id)->first();

        return view('Pets.PetsAdopt.editAdopt', compact('pet_adopt', 'id'));
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
        //
        $validatedData = $request->validate([
         'pet' => 'required|max:255',
         'user' => 'required|max:255',
         'adopted' => 'required|numeric',
        ]);
        PetAdopt::whereId($id)->update($validatedData);

        switch($request->get('approve'))
        {
            case 0:
                Post::postpone($id);
                break;
            case 1:
                Post::approve($id);
                break;
            case 2:
                Post::reject($id);
                break;
            case 3:
                Post::postpone($id);
                break;
            default:    
                break;

        }

        return redirect('/pet_adopts')->with('success', 'pet and user is successfully updated');
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
        $pet_adopt = PetAdopt::findOrFail($id);
        $pet_adopt->delete();

        return redirect('/pet_adopts')->with('success', 'pet and user is successfully deleted');
    }
}
