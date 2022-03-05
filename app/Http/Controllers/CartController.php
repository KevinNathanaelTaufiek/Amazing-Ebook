<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($locale = 'en')
    {
        App::setLocale($locale);
        $accountId = Auth::user()->account_id;
        $cart = Session::get('cart');

        $datacart = array();

        if (!isset($cart[$accountId])) {
            $cart[$accountId] = array();
        }

        foreach ($cart[$accountId] as $itemId) {
            array_push($datacart, EBook::find($itemId));
        }

        if( !$datacart ) {
            return view('transaction.cart', ['cart' => $datacart])->withErrors(__('customError.emptyCart'));
        }

        krsort($datacart);

        return view('transaction.cart', ['cart'=>$datacart]);
    }

    public function insertToCart(Request $request){

        $accountId = Auth::user()->account_id;
        $item = $request->ebook_id;

        $cart = Session::get('cart');

        if($cart == null){
            $cart = array();
        }

        if( !isset($cart[$accountId]) ){
            $cart[$accountId] = array();
        }

        if(array_search($item, $cart[$accountId]) !== false){
            return back()->withErrors(__('customError.alreadyOnCart'));
        }

        array_push($cart[$accountId], $item);

        Session::put('cart', $cart);
        Session::save();

        return redirect('/cart');
    }

    public function removeFromCart($id){
        $accountId = Auth::user()->account_id;

        $cart = Session::get('cart');

        if ($cart == null || !isset($cart[$accountId])) {
            return back()->withErrors(__('customError.emptyCart'));
        }

        foreach ($cart[$accountId] as $key => $item) {
            if($item == $id){
                unset($cart[$accountId][$key]);
            }
        }

        Session::put('cart', $cart);
        Session::save();

        return redirect('/cart');

    }




}
