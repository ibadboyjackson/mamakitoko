<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Newsletter::orderBy('created_at', 'DESC')->paginate(5);
        $users = Newsletter::all();
        return view('admin.admin.pages.newsletter.index', compact('news', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.pages.newsletter.pages.create');
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
            'titre' => 'required|max:255',
            'contenu' => 'required',
            'image' => 'image'
        ]);
        $news = new News();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/images/'.$filename;
            Image::make($image)->fit(600, 306)->save($location);
            $news->image = $filename;
        }
        $news->titre = $request->get('titre');
        $news->contenu = $request->get('contenu');
        $news->save();
        $mails = Newsletter::all();
        foreach ($mails as $mail){
            $mails = $mail->email;
            $names = $mail->name;
            $id = $mail->id;
            $token = $mail->token;
            $data = [
                'email' => $mails,
                'id' => $id,
                'token' => $token,
                'name' => $names,
                'subject' => $request->titre,
                'bodyMessage' => $request->contenu,
                'image' => $filename
            ];
            Mail::send('admin.admin.pages.newsletter.mail.mail', $data, function ($message) use ($data){
                $message->from('Hello@mamakitoko.com');
                $message->to($data['email']);
                $message->subject($data['subject']);
            } );
        }
        Session::flash('success', 'Félicitation vous avez envoyé une newsletter à vos utilisateurs');
        return redirect()->route('admin.newsletter.index');
    }
    public function unsubscribe($id, $token){
        dd($id, $token);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Newsletter::find($id);
        $news->delete();
        Session::flash('success', 'Cet utilisateur a été supprimé');
        return redirect()->route('admin.newsletter.index');
    }
}
