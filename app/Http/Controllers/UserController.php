<?php

namespace App\Http\Controllers;

use App\User;
use App\Companies;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
    	$user = new User();
    	return $user->allUserJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'secondary_contact'	=> $request->secondary_contact,
            'current_position'	=> $request->current_position,
            'primary_contact'	=> $request->primary_contact,
            'companies_id'		=> (int) $request->company['id'],
            'is_active'			=> $request->isActive,
            'password'			=> bcrypt($request->password),
            'address'			=> $request->address,
            'email'				=> $request->email,
            'name'				=> $request->name,
        ]);

        $user = $user->prepareJSON($user);

        return response()->json([
            'content' => $user,
            'action' => 'add',
            'type' => 'success',
            'msg' => 'Success add user'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UserRequest $request, User $user)
    {
    		
    	$user->secondary_contact = $request->secondary_contact;
        $user->current_position = $request->current_position;
        $user->primary_contact = $request->primary_contact;
        $user->companies_id = Companies::where('name',$request->company)->get()->first()->id;
        $user->is_active = $request->isActive;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->update();

        $user = $user->prepareJSON($user);

        return response()->json([
            'content' => $user, 
            'action' => 'edit', 
            'type' => 'success',
            'msg' => 'Success update user'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(User $user)
    {   
        $user->delete();

        return response()->json('Success delete user',200);
    }
}
