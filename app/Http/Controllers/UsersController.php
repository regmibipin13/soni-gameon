<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use App\Notifications\UserAccountEnableDisable;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\QueryBuilder;

class UsersController extends Controller
{
    use SendsPasswordResetEmails;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters(['name', 'email', 'phone', 'user_type'])
            ->paginate()
            ->appends($request->query());
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->roles);
        return redirect()->to('/users')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user->load(['roles']);
        $roles = Role::pluck('name', 'id');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->roles);
        return redirect()->to('/users')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }

    /**
     * Change the status of specific users
     */
    public function status(User $user, Request $request)
    {
        $user->is_disabled = !$user->is_disabled;
        if (!$user->is_disabled) {
            $user->disable_reason = "";
        } else {
            $request->validate([
                'disable_reason' => 'required'
            ]);
            $user->disable_reason = $request->disable_reason;
        }
        $user->save();
        $user->notify(new UserAccountEnableDisable($user));
        return redirect()->back()->with('success', 'User Status Changed Successfully');
    }
    /**
     * Resets the password of specific user
     */
    public function reset(User $user, Request $request)
    {
        $request->merge(['email' => $user->email]);
        $this->sendResetLinkEmail($request);
        return redirect()->back()->with('success', 'User Password Reset Successfully');
    }
}
