<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\Event;
use App\User;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Registration::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
        ]);

        if(Registration::create([
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
            ]))

            // {    //PB CORS
            //     $updRegistered=Registration::select('*')
            //         ->where('event_id', '=', $request->event_id)
            //         ->count();dd($updRegistered);
            //     Event::update([
            //         'registered' => "$updRegistered"
            //     ]);
            // }

        {
            return response()->json([
                'success' => 'Nouvelle inscription créée avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($event)
    {
        // return $registration;
        $req=Registration::join('events', 'registrations.event_id', '=', 'events.event_id')
        ->join('users', 'registrations.user_id', '=', 'users.user_id')
        ->where('events.event_id', '=', $event)
        ->select('registrations.reg_id', 'events.type', 'events.date_start', 'users.lastname', 'users.firstname', 'users.phone', 'users.email')
        ->get();
        return $req;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        $request->validate([
            'event_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
        ]);

        if($registration->update([
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
            ]))

        // {    // PB CORS
        //     $updRegistered=Registration::select('*')
        //         ->where('event_id', '=', $registration->event_id)
        //         ->count();dd($updRegistered);
        //     Event::update([
        //         'registered' => "$updRegistered"
        //     ]);
        // }

        {
            return response()->json([
                'success' => 'Inscription modifiée avec succès'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();
        return response()->json([
            'success' => 'Inscription supprimée avec succès'
        ], 200);
        // return redirect()->route(ROUTE.TO.REGISTRATIONS.INDEX)->with('success', "XXX has been deleted");    // TODO
    }
}
