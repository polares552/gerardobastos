<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
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

    public function index(Request $request)
    {
        $payments = array();
        if (!empty(Auth::user()->code)) {
            $payment_obj = new Payment();
            $payments = $payment_obj->getPayments(Auth::user()->code, $request->all(), 15);
        }
        $request->flash();
        $now = Carbon::now()->format('Ymd');
        return view('payment', compact('payments', 'now'));
    }
}
