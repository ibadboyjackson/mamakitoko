<?php

namespace App\Http\Controllers\admin;

use App\Membre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use App\Category;

class MembresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Membre::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.admin.pages.membres.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.admin.pages.membres.pages.create', compact('categories'));
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
            'nom' => 'required',
            'prenom' => 'required',
            'image' => 'required|image',
            'image_1' => 'required|image',
            'fonction' => 'required',
            'description' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
        ]);
        $medias = new Membre();
        $medias->nom = $request->get('nom');
        $medias->prenom = $request->get('prenom');
        $medias->fonction = $request->get('fonction');
        $medias->category_id = $request->get('category_id');
        $medias->description = $request->get('description');
        $medias->facebook = $request->get('facebook');
        $medias->instagram = $request->get('instagram');
        $medias->twitter = $request->get('twitter');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/encore/'.$filename;
            Image::make($image)->fit(211, 211)->save($location);
            $medias->image = $filename;
        }
        if($request->hasFile('image_1')){
            $image = $request->file('image_1');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/encore/'.$filename;
            Image::make($image)->fit(850, 280)->save($location);
            $medias->image_1 = $filename;
        }
        if($request->hasFile('image_2')){
            $image = $request->file('image_2');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/encore/'.$filename;
            Image::make($image)->fit(500, 500)->save($location);
            $medias->image_2 = $filename;
        }
        if($request->hasFile('image_3')){
            $image = $request->file('image_3');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/encore/'.$filename;
            Image::make($image)->fit(500, 500)->save($location);
            $medias->image_3 = $filename;
        }

        $medias->save();
        Session::flash('success', 'La membre a été ajouté avec succès à l\'équipe');
        return redirect()->route('admin.membre.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Membre::find($id);
        return view('admin.admin.pages.membres.pages.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = Membre::find($id);
        $categories = Category::all();
        return view('admin.admin.pages.membres.pages.edit', compact('media', 'categories'));
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
            'image' => 'required|image',
            'image_1' => 'required|image',
            'fonction' => 'required',
            'description' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
        ]);
        $medias = Membre::find($id);
        $medias->nom = $request->get('nom');
        $medias->prenom = $request->get('prenom');
        $medias->description = $request->get('description');
        $medias->fonction = $request->get('fonction');
        $medias->category_id = $request->get('category_id');
        $medias->facebook = $request->get('facebook');
        $medias->instagram = $request->get('instagram');
        $medias->twitter = $request->get('twitter');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/encore/'.$filename;
            Image::make($image->getRealPath())->fit(211, 211)->save($location);
            $medias->image = $filename;
        }
        if($request->hasFile('image_1')){
            $image = $request->file('image_1');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/encore/'.$filename;
            Image::make($image)->fit(850, 280)->save($location);
            $medias->image_1 = $filename;
        }
        if($request->hasFile('image_2')){
            $image = $request->file('image_2');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/encore/'.$filename;
            Image::make($image)->fit(500, 500)->save($location);
            $medias->image_2 = $filename;
        }
        if($request->hasFile('image_3')){
            $image = $request->file('image_3');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/encore/'.$filename;
            Image::make($image)->fit(500, 500)->save($location);
            $medias->image_3 = $filename;
        }
        $medias->save();
        Session::flash('success', 'La membre a été modifié avec succès');
        return redirect()->route('admin.membre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Membre::find($id);
        $media->delete();
        Session::flash('success', 'Le membre a été supprimé avec succès');
        return redirect()->route('admin.membre.index');
    }
}
