<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function history($locale = 'en')
    {
        App::setLocale($locale);
        $accountId = Auth::user()->account_id;
        $orders = Order::where('account_id',$accountId)->get()->sortByDesc('order_date');

        if (!$orders->first()) {
            return view('transaction.history', ['orders' => $orders])->withErrors(__('customError.emptyHistory'));
        }

        return view('transaction.history', ['orders' => $orders]);
    }

    public function checkout($locale = 'en')
    {
        App::setLocale($locale);
        $accountId = Auth::user()->account_id;

        $cart = Session::get('cart');

        if ($cart == null || !isset($cart[$accountId])) {
            return back()->withErrors(__('customError.emptyCart'));
        }

        foreach ($cart[$accountId] as $key => $item) {
            Order::create([
                'account_id' => $accountId,
                'ebook_id' => $item,
                'order_date' => date("Y-m-d H:i:s")
            ]);
            unset($cart[$accountId][$key]);
        }

        Session::put('cart', $cart);
        Session::save();

        return view('partials.saved');
    }
}
