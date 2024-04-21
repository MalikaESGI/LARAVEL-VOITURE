<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GestionUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class GestionUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users'=> $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();

        $role = ['admin', 'user'];
        $currentRole = $user->role;

        return view('admin.users.create',[
            'user'=> $user,
            'role'=> $role,
            'currentRole'=> $currentRole
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( GestionUserRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('admin.user.index')->with('success', 'L\'utilisateur a été bien créer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {  
        $role = ['admin','user'];
       $currentRole = $user->role;

        return view('admin.users.create', [
            'user'=> $user,
            'role'=> $role,
            'currentRole' => $currentRole,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GestionUserRequest $request, User $user)
    {
        $user->update($request->validated());
    
        return redirect()->route('admin.user.index')->with('success', 'L\'utilisateur a été bien mis à jour');
    }



    /**
     * Remove the specified resource from storage.
     */


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'L\'utilisateur a été supprimé avec succès.');
    }
}
