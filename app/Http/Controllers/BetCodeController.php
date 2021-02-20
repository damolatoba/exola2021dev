<?php

namespace App\Http\Controllers;
use App\BetCode;
use App\BetSelect;

use Illuminate\Http\Request;

class BetCodeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bookings-admin.create-code');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $id = BetCode::create([
            'bet_code' => $request['betcode'],
            'odds' => $request['odds'],
        ])->id;
        // dd($id);
        $index = 0;
        foreach($request['hometeam'] as $home){
            BetSelect::create([
                'bet_id' => $id,
                'home' => $request['hometeam'][$index],
                'away' => $request['awayteam'][$index],
                'selection' => $request['selection'][$index],
            ]);
            $index = $index+1;
        }

        return back()->with('success','Code posted successfully!');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(BetCode $betcode)
    {
        //
        // dd($betcode);

        BetCode::destroy($betcode->id);
        return back()->with('success','Code deleted successfully!');
        
    }
}
