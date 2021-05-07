<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartController extends GeneralController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('frontend.cart');
    }
}
