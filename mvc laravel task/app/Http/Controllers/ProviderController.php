<?php

namespace App\Http\Controllers;

use App\provider;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
//use Illuminate\Notifications\Notifiable;
//use App\Notifications\AgendamentoPendente;
//use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class providerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome',compact('provider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provider = provider::orderByDesc('id')->get();
        return view('/',compact('provider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provider                      = new provider();
        $provider->name       =$request->get('name');
        $provider->phone      =$request->get('phone');
        $provider->email      =$request->get('email');
        $provider->time       =$request->get('time');
        $provider->save();

        Mail::to($request['email'])->send(new WelcomeMail($provider));
//          Mail::to($request['email'])->send(new MailNotify($provider));

        return redirect()->route('form');

//        $provider = provider::select("email")->get();
//        \Notification::send($provider, new AgendamentoPendente(1));



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, provider $provider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(provider $provider)
    {
        //
    }
}
