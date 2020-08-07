<?php

namespace App\Http\Controllers\Web\Users;

use App\Domain\Users\Preference;
use App\Domain\Users\Province;
use App\Domain\Users\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\RegisterRequest;

class UserController extends Controller
{
    public function signUp()
    {
        return view('register', [
            'provinces'   => Province::orderBy('provincia')->get(),
            'preferences' => Preference::get(),
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        if ($request->has('preferences')) {
            $user->preferences()->sync($request->preferences);
        }
        return redirect()->back()->with('message', 'Usuario registrado!');
    }
}
