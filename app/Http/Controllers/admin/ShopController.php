<?php

namespace App\Http\Controllers\admin;

use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.admin.pages.shop.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.pages.shop.pages.create');
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
        $shops = new Shop();
        $shops->titre = $request->get('titre');
        $shops->description = $request->get('description');
        $shops->prix = $request->get('prix');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/'.$filename;
            Image::make($image)->fit(794, 794)->save($location);
            $shops->image = $filename;
        }
        if($request->hasFile('image_1')){
            $image_1 = $request->file('image_1');
            $filename_1 = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/'.$filename_1;
            Image::make($image_1)->fit(794, 794)->save($location);
            $shops->image_1 = $filename_1;
        }
        if($request->hasFile('image_2')){
            $image_2 = $request->file('image_2');
            $filename_2 = time(). '.' . $image_2->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/'.$filename_2;
            Image::make($image_2)->fit(794, 794)->save($location);
            $shops->image_2 = $filename_2;
        }
        $shops->save();
        Session::flash('success', 'L\'article a été créé avec succès');
        return redirect()->route('admin.shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        return view('admin.admin.pages.shop.pages.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);
        return view('admin.admin.pages.shop.pages.edit', compact('shop'));
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
        $shops = Shop::find($id);
        $shops->titre = $request->get('titre');
        $shops->description = $request->get('description');
        $shops->prix = $request->get('prix');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/'.$filename;
            Image::make($image)->fit(794, 794)->save($location);
            $shops->image = $filename;
        }
        if($request->hasFile('image_1')){
            $image_1 = $request->file('image_1');
            $filename_1 = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/'.$filename_1;
            Image::make($image_1)->fit(794, 794)->save($location);
            $shops->image_1 = $filename_1;
        }
        if($request->hasFile('image_2')){
            $image_2 = $request->file('image_2');
            $filename_2 = time(). '.' . $image_2->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/img/'.$filename_2;
            Image::make($image_2)->fit(794, 794)->save($location);
            $shops->image_2 = $filename_2;
        }
        $shops->save();
        Session::flash('success', 'L\'article a été créé avec succès');
        return redirect()->route('admin.shop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);
        $shop->delete();
        Session::flash('success', 'Cet article a été supprimé avec succès');
        return redirect()->route('admin.shop.index');
    }
}
