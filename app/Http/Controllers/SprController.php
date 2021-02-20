<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SprPost;

class SprController extends Controller
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
        $allowed_files = ['mp4', 'mov', 'mpeg4', 'jpg', 'jpeg', 'png'];
        $input = $request->all();
        
        $post = $request->file('savpost');
        $string = str_replace(' ', '-', $post->getClientOriginalName());
        $extension = pathinfo($post->getClientOriginalName(), PATHINFO_EXTENSION);
        if(in_array(strtolower($extension), $allowed_files)){
            $postName = time().''.rand().''.$string;
            $post->move(public_path('uploads/spr_posts'), $postName);
            $input['file_name'] = $postName;
            $input['file_type'] = strtolower($extension);

            if(isset($input['caption'])){
                SprPost::create([
                    'file_name' => $input['file_name'],
                    'file_type' => $input['file_type'],
                    'social_media' => $input['social_media'],
                    'caption' => $input['caption'],
                    // 'lct' => 0,
                    // 'lcf' => 0,
                    // 'dct' => 0,
                    // 'dcf' => 0,
                    // 'comment_count' => 0,
                ]);
            }else{
                SprPost::create([
                    'file_name' => $input['file_name'],
                    'file_type' => $input['file_type'],
                    'social_media' => $input['social_media'],
                    'caption' => '',
                    // 'lct' => 0,
                    // 'lcf' => 0,
                    // 'dct' => 0,
                    // 'dcf' => 0,
                    // 'comment_count' => 0,
                ]);
            }
                return back()->with('success','Savage Post Uploaded successfully!');
            
            // dd($input);
        }else{
            return back()->with('error','File type is not allowed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SprPost $post)
    {
        //
        // dd($post);
        SprPost::destroy($post->id);
        return back()->with('success','Post deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like(SprPost $post)
    {
        //
        // dd($post);
        $post->lct = $postName;
        // SprPost::destroy($post->id);
        // return back()->with('success','Post deleted successfully!');
    }
}
