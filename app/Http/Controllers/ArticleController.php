<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $articles = Article::all();
        $articles = Article::orderBy('rank', 'DESC')->get();
        return view('spr-admin.articles', compact('articles'));
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
        $allowed_files = ['jpg', 'jpeg', 'png'];
        $input = $request->all();
        
        $post = $request->file('artpost');
        $string = str_replace(' ', '-', $post->getClientOriginalName());
        $extension = pathinfo($post->getClientOriginalName(), PATHINFO_EXTENSION);
        if(in_array(strtolower($extension), $allowed_files)){
            $postName = time().''.rand().''.$string;
            $post->move(public_path('uploads/articles_post'), $postName);
            $input['image_name'] = $postName;

            Article::create([
                'title' => $input['title'],
                'image_name' => $input['image_name'],
                'content' => $input['editor2'],
                'rank' => 0,
            ]);
                return back()->with('success','Article Posted successfully!');
            
            // dd($input);
        }else{
            return back()->with('error','File type is not allowed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        dd($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function new_article()
    {
        //
        return view('spr-admin.new-article');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        // dd($article->id);
        return view('spr-admin.article-edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        $allowed_files = ['jpg', 'jpeg', 'png'];
        $input = $request->all();
        // dd($article);
        // $course = Course::find($course->id);
        $article->title = $request->input('title');
        $article->content = $request->input('editor2');
        if ($request->hasFile('artpost')){
            $post = $request->file('artpost');
            $string = str_replace(' ', '-', $post->getClientOriginalName());
            $extension = pathinfo($post->getClientOriginalName(), PATHINFO_EXTENSION);
            if(in_array(strtolower($extension), $allowed_files)){
                $postName = time().''.rand().''.$string;
                $post->move(public_path('uploads/articles_post'), $postName);
                $article->image_name = $postName;
            }else{
                return back()->with('error','File type is not allowed!');
            }
        }
        $result = $article->save();
        return back()->with('success','Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        Article::destroy($article->id);
        return back()->with('success','Article deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function uprank(Article $article)
    {
        //
        // Article::destroy($article->id);
        $article->rank = $article->rank + 1;
        $result = $article->save();
        return back()->with('success','Ranked successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function downrank(Article $article)
    {
        //
        $article->rank = $article->rank - 1;
        $result = $article->save();
        return back()->with('success','Ranked successfully!');
    }
}
