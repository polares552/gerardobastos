<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $saldo = number_format(0, 2, ',', '.');
        $history = array();

        if (!empty(Auth::user()->code)) {
            $user = new User();
            $saldo = $user->getSaldo(Auth::user()->code);
            $saldo = number_format(floatval(substr($saldo, 0, -2) . '.' . substr($saldo, -2)), 2, ',', '.');

            $history = $user->getHistory(Auth::user()->code, 15);
        }
        return view('home', compact('saldo', 'history'));
    }
}
