<?php

namespace App\Http\Controllers\admin;

use App\Partenaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PartenairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Partenaire::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.admin.pages.partenaires.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.pages.partenaires.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image',
        ]);
        $medias = new Partenaire();
        $medias->name = $request->get('name');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/logos/'.$filename;
            Image::make($image)->fit(200, 50)->save($location);
            $medias->image = $filename;
        }
        $medias->save();
        Session::flash('success', 'Le partenaire a été ajouté avec succès');
        return redirect()->route('admin.partenaires.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Partenaire::find($id);
        return view('admin.admin.pages.partenaires.pages.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = Partenaire::find($id);
        return view('admin.admin.pages.partenaires.pages.edit', compact('media'));
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
            'name' => 'required',
            'image' => 'required|image',
        ]);
        $medias = Partenaire::find($id);
        $medias->name = $request->get('name');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/logos/'.$filename;
            Image::make($image)->fit(200, 50)->save($location);
            $medias->image = $filename;
        }
        $medias->save();
        Session::flash('success', 'Le partenaire a été modifiée avec succès');
        return redirect()->route('admin.partenaires.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Partenaire::find($id);
        $media->delete();
        Session::flash('success', 'Ce partenaire a été supprimée avec succès');
        return redirect()->route('admin.partenaires.index');
    }
}
