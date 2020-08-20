<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;


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
        $contacts = Contacts::paginate(10);
        return view('home', compact('contacts') );
    }
}
