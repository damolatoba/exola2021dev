<?php

namespace App\Http\Controllers;

use App\Tdbk;
use Illuminate\Http\Request;

class TdbkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $book_check = Tdbk::all();
        // if($book_check->count()>0){
        //     Tdbk::truncate();
        // }
        $allowed_files = ['mp4', 'mov', 'mpeg4', 'jpg', 'jpeg', 'png'];
        $input = $request->all();
        
        $post = $request->file('bookpost');
        $string = str_replace(' ', '-', $post->getClientOriginalName());
        $extension = pathinfo($post->getClientOriginalName(), PATHINFO_EXTENSION);
        if(in_array(strtolower($extension), $allowed_files)){
            $postName = time().''.rand().''.$string;
            $post->move(public_path('uploads/tdbooks'), $postName);
            $input['file_name'] = $postName;
            $input['file_type'] = $extension;

            Tdbk::create($input);
                return back()->with('success','Booking Posted successfully!');
            
            // dd($input);
        }else{
            return back()->with('error','File type is not allowed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tdbk  $tdbk
     * @return \Illuminate\Http\Response
     */
    public function show(Tdbk $tdbk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tdbk  $tdbk
     * @return \Illuminate\Http\Response
     */
    public function edit(Tdbk $tdbk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tdbk  $tdbk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tdbk $tdbk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tdbk  $tdbk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tdbk $tdbk)
    {
        //
        // dd($tdbk);
        Tdbk::destroy($tdbk->id);
        return back()->with('success','Booking deleted successfully!');
    }
}
