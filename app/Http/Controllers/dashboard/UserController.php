<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Models\User;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role.admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view("dashboard.user.index", ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view("dashboard.user.create", ['user' => new User()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUserPost  $request
     * @return RedirectResponse
     */
    public function store(StoreUserPost $request): RedirectResponse
    {
        //User::create($request->validated());
        User::create(
            [
                'name' => $request['name'],
                'role_id' => 1, // rol de admin
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]
        );

        return back()->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('dashboard.user.show')->with(['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('dashboard.user.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreUserPost  $request
     * @param  User  $user
     * @return RedirectResponse
     */
    public function update(StoreUserPost $request, User $user): RedirectResponse
    {
        //$user->update($request->validated());
        $user->update(
            [
                'name' => $request['name'],
                'email' => $request['email'],
            ]
        );

        return back()->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User was successfully removed.');
    }
}
