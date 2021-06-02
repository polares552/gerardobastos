<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function editPassword()
    {
        return view('password');
    }

    public function updatePassword(PasswordRequest $request)
    {
        try {
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->user_password_new)]);
            return redirect(route('profile.password.edit'))->with('alert-success', 'Senha atualizada com sucesso!');
        } catch (Exception $ex) {
            return redirect()->back()->with('alert-danger', $ex->getMessage());
        }
    }
}
