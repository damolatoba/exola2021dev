<?php

namespace App\Http\Controllers;

use App\User;
use App\SprPost;
use App\Tdbk;
use App\BetCode;
use App\BetSelect;
use App\CopyPost;
use Illuminate\Http\Request;

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
        $users = User::where('class', '=', 'b')->get();
        $sprs = SprPost::all();
        $today_book = Tdbk::orderBy('rate', 'DESC')->orderBy('id', 'DESC')->get();
        // dd($today_book);
        $copy_post = CopyPost::orderBy('id', 'DESC')->first();
        $betcodes = BetCode::all();
        $betselections = BetSelect::all();
        return view('home', compact('users', 'sprs', 'today_book', 'betcodes', 'betselections', 'copy_post'));
    }

    public function responses()
    {
        $users = User::where('class', '=', 'c')->get();
        $sprs = SprPost::all();
        // dd($users);
        return view('responses', compact('sprs'));
    }
}
