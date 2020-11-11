<?php

namespace App\Http\Controllers\admin;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = About::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.admin.pages.apropos.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.pages.apropos.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'titre' => 'required',
            'contenu' => 'required',
            'image' => 'required|image',
        ]);
        $medias = new About();
        $medias->date = $request->get('date');
        $medias->titre = $request->get('titre');
        $medias->contenu = $request->get('contenu');
        $medias->nom = $request->get('nom');
        $medias->description = $request->get('description');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/about/'.$filename;
            Image::make($image)->fit(200, 200)->save($location);
            $medias->image = $filename;
        }
        $medias->save();
        Session::flash('success', 'La description a été crééé avec succès');
        return redirect()->route('admin.apropos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = About::find($id);
        return view('admin.admin.pages.apropos.pages.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = About::find($id);
        return view('admin.admin.pages.apropos.pages.edit', compact('media'));
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
        $this->validate($request, [
            'date' => 'required',
            'titre' => 'required',
            'contenu' => 'required',
            'image' => 'required|image',
        ]);
        $medias = About::find($id);
        $medias->date = $request->get('date');
        $medias->titre = $request->get('titre');
        $medias->contenu = $request->get('contenu');
        $medias->nom = $request->get('nom');
        $medias->description = $request->get('description');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/about/'.$filename;
            Image::make($image)->fit(200, 200)->save($location);
            $medias->image = $filename;
        }
        $medias->save();
        Session::flash('success', 'La description a été modifiée avec succès');
        return redirect()->route('admin.apropos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = About::find($id);
        $media->delete();
        Session::flash('success', 'Cette description a été supprimée avec succès');
        return redirect()->route('admin.apropos.index');
    }
}
