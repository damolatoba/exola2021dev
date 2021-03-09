<?php

namespace App\Http\Controllers;

use App\Article;
use App\BetCode;
use App\BetSelect;
use App\SprPost;
use App\Tdbk;
use App\Comments;
use Illuminate\Http\Request;

class FEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::orderBy('rank', 'DESC')->get();
        $sprs = SprPost::all();
        $comments = Comments::where('reply_to', '=', 0)->orderBy('id', 'DESC')->get();
        $replycomments = Comments::where('reply_to', '!=', 0)->orderBy('id', 'DESC')->get();
        $sprs_t = $sprs->where('social_media', '=', 'Twitter');
        $sprs_i = $sprs->where('social_media', '=', 'Instagram');
        $sprs_f = $sprs->where('social_media', '=', 'Facebook');
        $today_book = Tdbk::orderBy('rate', 'DESC')->orderBy('id', 'DESC')->get();
        $betcodes = BetCode::all();
        $betselections = BetSelect::all();
        // dd($betcodes);
        return view('front-end.welcome', compact('articles', 'sprs', 'betcodes', 'betselections', 'sprs_t', 'sprs_i', 'sprs_f', 'today_book', 'comments', 'replycomments'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        // dd($article);
        // $article = $article->id;
        $articles = Article::all();
        return view('front-end.article', compact('articles', 'article'));
    }

    public function showpost(Tdbk $post)
    {
        //
        // dd($post);
        // $article = $post->id;
        $articles = Article::all();
        return view('front-end.post', compact('articles', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function makecomment(Request $request)
    {
        //
        // $input = Request::all();
        $data = $request->json()->all();
        // dd($input);
        // $name = $request->username;
        Comments::create([
            'username' => $data['username'],
            'comment' => $data['comment'],
            'post_id' => $data['postid'],
            'reply_to' => $data['replyto'],
            'is_deleted' => 0
        ]);
        // return 200;
        return response()->json(['success'=>'Ajax request submitted successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
