<?php

namespace App\Http\Controllers\admin;

use App\Home;
use App\Home1;
use App\Home2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class Posts2Controller extends Controller
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
        $home = Home2::find($id);
        return view('admin.admin.pages.home.pages2.show', compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home = Home2::find($id);
        return view('admin.admin.pages.home.pages2.edit', compact('home'));
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
        ]);
        $home = Home2::find($id);
        $home->titre = $request->get('titre');
        $home->contenu = $request->get('contenu');
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
        $home = Home2::find($id);
        $home->delete();
        Session::flash('success', 'Cette page a été supprimer avec succès');
        return redirect()->route('admin.dashboard.index');
    }
}
