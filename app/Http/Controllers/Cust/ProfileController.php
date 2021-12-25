<?php

namespace App\Http\Controllers\Cust;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('user.customer.editprofile',['user'=>$user]);
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

    public function storePhoto(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        if ($request->file('photo')) {
            $image_name = $request->file('photo')->store('images','public');
        }
        $user->photo = $image_name;
        $user->save();        
        return redirect('profile');
    }

    public function updatePhoto(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        if ($user->photo && file_exists(storage_path('app/public/'.$user->photo))) {
            \Storage::delete('public/'.$user->photo);
        }
        $image_name = $request->file('photo')->store('images','public');
        $user->update();
        return redirect('profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->first_name = $request->first_name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;        
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->province = $request->province;
        $user->city = $request->city;
        // validasi password tidak diganti atau null
        if($request->password != null){
            $this->validate($request, [
                'password' => 'min:8', 'string', 'confirmed'
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->update();
        return redirect('profile');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
