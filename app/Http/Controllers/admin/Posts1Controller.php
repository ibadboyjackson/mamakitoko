<?php

namespace App\Http\Controllers\admin;

use App\Home;
use App\Home1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class Posts1Controller extends Controller
{
    public function __construct()
    {
        return $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $home = Home1::find($id);
        return view('admin.admin.pages.home.pages1.show', compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home = Home1::find($id);
        return view('admin.admin.pages.home.pages1.edit', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titre' => 'required|max:25',
            'contenu' => 'required|max:260',
            'image' => 'required|image'
        ]);
        $home = Home1::find($id);
        $home->titre = $request->get('titre');
        $home->contenu = $request->get('contenu');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/images/'.$filename;
            Image::make($image)->fit(1920, 1225)->save($location);
            $home->image = $filename;
        }
        $home->save();
        Session::flash('success', 'Cette page a été modifier avec succès');
        return redirect()->route('admin.dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $home = Home1::find($id);
        $home->delete();
        Session::flash('success', 'Cette page a été supprimer avec succès');
        return redirect()->route('admin.dashboard.index');
    }
}
