<?php

namespace App\Http\Controllers\admin;

use App\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class MediasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.admin.pages.media.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.pages.media.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' => 'required',
            'contenu' => 'required',
            'image' => 'required|image',
            'author' => 'required'
        ]);
        $medias = new Media();
        $medias->titre = $request->get('titre');
        $medias->contenu = $request->get('contenu');
        $medias->author = $request->get('author');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/'.$filename;
            Image::make($image)->fit(700, 400)->save($location);
            $medias->image = $filename;
        }
        $medias->save();
        Session::flash('success', 'La news a été crééé avec succès');
        return redirect()->route('admin.media.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Media::find($id);
        return view('admin.admin.pages.media.pages.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = Media::find($id);
        return view('admin.admin.pages.media.pages.edit', compact('media'));
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
            'titre' => 'required',
            'contenu' => 'required',
            'image' => 'required|image',
            'author' => 'required'
        ]);
        $medias = Media::find($id);
        $medias->titre = $request->get('titre');
        $medias->contenu = $request->get('contenu');
        $medias->author = $request->get('author');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/'.$filename;
            Image::make($image)->fit(700, 400)->save($location);
            $medias->image = $filename;
        }
        $medias->save();
        Session::flash('success', 'La news a été modifiée avec succès');
        return redirect()->route('admin.media.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::find($id);
        $media->delete();
        Session::flash('success', 'Cette news a été supprimée avec succès');
        return redirect()->route('admin.media.index');
    }
}
