<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
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
        $veicle_obj = new Vehicle();
        $vehicles = $veicle_obj->getVehicles(Auth::user()->code, 15);
        return view('vehicle', compact('vehicles'));
    }
}
