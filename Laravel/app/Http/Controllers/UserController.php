<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Test;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User_Test::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user_model.create');  //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $user_new = new User_Test([
            'name' => $request->get('name'),
            'email' => $request->get('email')
        ]);
        $user_new->save();
        return redirect()->route('user_model.create')->with('success',
        'Data Added');
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

    public function store_api()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
    
    
    
       return User_Test::create([
            'name' => request('name'),
            'email' => request('email')
       ]);
        
    }

    public function update_api(User_Test $user)
    {
        $success = $user -> update([
            'name'=> request('name'),
            'email' => request('email')
        ]);
    
        return [
            'success' => $success
        ];
    }

    public function destroy_api(User_Test $user)
    {
        $success = $user->delete();

    return [
        'success' => $success
    ];
    }

}
