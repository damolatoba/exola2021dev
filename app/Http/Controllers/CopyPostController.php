<?php

namespace App\Http\Controllers;

use App\CopyPost;
use App\Tdbk;
use App\Article;
use Illuminate\Http\Request;

class CopyPostController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        //
        $articles = Article::all();
        $today_book = Tdbk::orderBy('id', 'DESC')->first();
        $copy_post = CopyPost::orderBy('id', 'DESC')->first();
        // $search  = array("<p>", ";", "<br />", "</p>");
        // $replace = array("<table> <tr> <td>", "</td> <td>", "</td> </tr> <tr> <td>", "</td> </tr> </table>");
        // $copy_post->content = str_replace($search, $replace, $copy_post->content);
        // dd($betcodes);
        return view('front-end.copy-code', compact('articles', 'today_book', 'copy_post'));

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
        CopyPost::create([
            'content' => $request['editor4'],
        ]);

        return back()->with('success','Codes for copy posted successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CopyPost  $copyPost
     * @return \Illuminate\Http\Response
     */
    public function show(CopyPost $copyPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CopyPost  $copyPost
     * @return \Illuminate\Http\Response
     */
    public function edit(CopyPost $copyPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CopyPost  $copyPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CopyPost $copyPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CopyPost  $copyPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(CopyPost $copyPost)
    {
        //
    }
}
