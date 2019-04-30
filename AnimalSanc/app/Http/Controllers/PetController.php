<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pets = Pet::orderBy('created_at', 'desc')->paginate(8);
        return view('Pets.index', compact('pets', 'pet_adopt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        if ($request->isMethod('get')){
            return view('Pets.create');
        }
        else {
            $rules = [
                'description' => 'required',
                'name' => 'required|max:255',
                'type' => 'required|max:255',
                'date_of_birth' => 'required'
            ];
            $this->validate($request, $rules);
            $image = new Pet();
            if ($request->hasFile('image')) {
                $dir = 'uploads/';
                $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image')->move($dir, $fileName);
                $image->image = $fileName;
            }
            $image->description = $request->description;
            $image->name = $request->name;
            $image->type = $request->type;
            $image->date_of_birth = $request->date_of_birth;
            $image->save();
            return redirect('/allPets');
        }
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
        request()->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($files = $request->file('image')) {
           $destinationPath = 'public/image/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $insert['image'] = "$profileImage";
        }
        $check = Image::insertGetId($insert);
 
        return Redirect::to("image")
        ->withSuccess('Great! Image has been successfully uploaded.');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('Pets.create', ['image' => Pet::find($id)]);
        else {
            $rules = [
                'description' => 'required',
                'type' => 'required',
                'name' => 'required|max:255',
            ];
            $this->validate($request, $rules);
            $image = Pet::find($id);
            if ($request->hasFile('image')) {
                $dir = 'uploads/';
                if ($image->image != '' && File::exists($dir . $image->image))
                    File::delete($dir . $image->image);
                $extension = strtolower($request->file('image')->getClientOriginalExtension());
                $fileName = str_random() . '.' . $extension;
                $request->file('image')->move($dir, $fileName);
                $image->image = $fileName;
            } elseif ($request->remove == 1 && File::exists('uploads/' . $image->image)) {
                File::delete('uploads/' . $image->post_image);
                $image->image = null;
            }
            $image->description = $request->description;
            $image->save();
            return redirect('postview');
        }
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
        Pet::destroy($id);
        return redirect('/allPets');
    }
}
