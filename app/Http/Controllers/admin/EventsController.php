<?php

namespace App\Http\Controllers\admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.admin.pages.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.pages.events.pages.create');
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
            'event_date' => 'required',
            'author' => 'required'
        ]);
        $events = new Event();
        $events->titre = $request->get('titre');
        $events->contenu = $request->get('contenu');
        $events->author = $request->get('author');
        $events->event_date = $request->get('event_date');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/images/'.$filename;
            Image::make($image)->fit(700, 400)->save($location);
            $events->image = $filename;
        }
        $events->save();
        Session::flash('success', 'L\'événement a été crééé avec succès');
        return redirect()->route('admin.event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('admin.admin.pages.events.pages.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.admin.pages.events.pages.edit', compact('event'));
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
            'contenu' => 'required',
            'image' => 'required|image',
            'event_date' => 'required',
            'author' => 'required'
        ]);
        $events = Event::find($id);
        $events->titre = $request->get('titre');
        $events->contenu = $request->get('contenu');
        $events->author = $request->get('author');
        $events->event_date = $request->get('event_date');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/images/'.$filename;
            Image::make($image)->fit(700, 400)->save($location);
            $events->image = $filename;
        }
        $events->save();
        Session::flash('success', 'L\'événement a été modifié avec succès');
        return redirect()->route('admin.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        Session::flash('success', 'Cet événement a été supprimé avec succès');
        return redirect()->route('admin.event.index');
    }
}
