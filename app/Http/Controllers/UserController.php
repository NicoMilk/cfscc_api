<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Registration;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::orderBy('lastname')->get();
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
            'firstname' => ['required', 'string'],  // TODO reg exp ?
            'lastname' => ['required', 'string'],
            'email' => ['required', 'string'],
            // 'phone' => ['required', 'string'],
            'phone' => ['required', 'regex:/^[0-9]{10}/'],  // alt regex:/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/ complex french phone
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);
            
        if(User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]))
        {
            return response()->json([
                'success' => 'Nouvel utilisateur créé avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }
                                                                
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => ['required', 'string'],  // TODO reg exp ?
            'lastname' => ['required', 'string'],
            'email' => ['required', 'string'],
            // 'phone' => ['required', 'string'],
            'phone' => ['required', 'regex:/^[0-9]{10}/'],  // alt regex:/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/ complex french phone
            'password' => ['string', 'min:6'],
            'password_confirmation' => [],
        ]);
            
        if($user->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]))
        {
            return response()->json([
                'success' => 'Utilisateur modifié avec succès'
            ], 200);
        }
    }
                                                                

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Registration::where('user_id', $user->user_id)  // deletes registrations of the deleted user in the registrations table
        ->delete();
        
        $user->delete();
        return response()->json([
            'success' => 'Utilisateur supprimé avec succès'
        ], 200);
        // return redirect()->route(ROUTE.TO.USERS.INDEX)->with('success', "XXX has been deleted");    // TODO
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' =>'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'fail' => "Email et/ou mot de passe inconnu(s)"
            ]);
        }
        if ($user->role == "admin") {
            return $user->createToken('admin_token', ['admin', 'member', 'guest'])->plainTextToken;
        }
        if ($user->role == "member") {
            return $user->createToken('member_token')->plainTextToken;
        }
        if ($user->role == "guest") {
            return $user->createToken('guest_token')->plainTextToken;
        }

    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        // return redirect()->route("/home");
    }

}
