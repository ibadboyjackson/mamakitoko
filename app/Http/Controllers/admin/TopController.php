<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Top;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Top::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.admin.pages.shop.one.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.pages.shop.one.pages.create');
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
            'description' => 'required',
            'image' => 'required|image',
            'prix' => 'required'
        ]);
        $shops = new Top();
        $shops->titre = $request->get('titre');
        $shops->description = $request->get('description');
        $shops->prix = $request->get('prix');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/'.$filename;
            Image::make($image)->fit(1920, 720)->save($location);
            $shops->image = $filename;
        }
        $shops->save();
        Session::flash('success', 'L\'article a été créé avec succès');
        return redirect()->route('admin.top.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Top::find($id);
        return view('admin.admin.pages.shop.one.pages.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Top::find($id);
        return view('admin.admin.pages.shop.one.pages.edit', compact('shop'));
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
            'titre' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'prix' => 'required'
        ]);
        $shops = Top::find($id);
        $shops->titre = $request->get('titre');
        $shops->description = $request->get('description');
        $shops->prix = $request->get('prix');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/'.$filename;
            Image::make($image)->fit(1920, 720)->save($location);
            $shops->image = $filename;
        }
        $shops->save();
        Session::flash('success', 'L\'article a été créé avec succès');
        return redirect()->route('admin.top.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Top::find($id);
        $shop->delete();
        Session::flash('success', 'Cet article a été supprimé avec succès');
        return redirect()->route('admin.top.index');
    }
}
