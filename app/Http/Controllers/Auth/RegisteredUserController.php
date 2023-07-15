<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\View\View;
use App\Http\Requests\userRegister;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('front.auth.register');
    }

    public function store(userRegister $request): RedirectResponse
    {
        $data=$request->validated();
        $data['password']=Hash::make($data['password']);
        $user = User::create($data);

        Auth::login($user);

        return to_route('/front.index');

        // event(new Registered($user));

    }
}
