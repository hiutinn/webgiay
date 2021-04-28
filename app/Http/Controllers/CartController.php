<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Banner;
use App\Product;
use App\Contact;

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
