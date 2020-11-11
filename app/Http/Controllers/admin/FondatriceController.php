<?php

namespace App\Http\Controllers\admin;

use App\Fondatrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class FondatriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Fondatrice::all();
        return view('admin.admin.pages.fondatrice.index', compact('news'));
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
        $news = Fondatrice::find($id);
        return view('admin.admin.pages.fondatrice.pages.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = Fondatrice::find($id);
        return view('admin.admin.pages.fondatrice.pages.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'experience' => 'required',
            'education' => 'required',
            'competences' => 'required',
            'interet' => 'required',
        ]);
        $medias = Fondatrice::find($id);
        $medias->nom = $request->get('nom');
        $medias->prenom = $request->get('prenom');
        $medias->description = $request->get('description');
        $medias->telephone = $request->get('telephone');
        $medias->email = $request->get('email');
        $medias->adresse = $request->get('adresse');
        $medias->experience = $request->get('experience');
        $medias->education = $request->get('education');
        $medias->competences = $request->get('competences');
        $medias->interet = $request->get('interet');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/team/'.$filename;
            Image::make($image)->fit(500, 500)->save($location);
            $medias->image = $filename;
        }
        $medias->save();
        Session::flash('success', 'Vos informations ont été modifiées avec succès');
        return redirect()->route('admin.fondatrice.index');
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
}
