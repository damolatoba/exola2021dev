<?php

namespace App\Http\Controllers;

use App\Tdbk;
use App\Comments;
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

    public function viewpost($post)
    {
        //
        $comments = Comments::where('post_id', '=', $post)->where('is_deleted', '=', 0)->get();
        $post = Tdbk::find($post);
        
        // dd($post);
        return view('bookings-admin.post-view', compact('post', 'comments'));
    }

    public function delcomment($post)
    {
        //
        
        $post = Comments::find($post);
        // dd($post);
        $post->is_deleted = 1;
        $post->save();
        // $comments = Comments::where('post_id', '=', $post)->get();
        // $post = Tdbk::find($post);
        
        // dd($post);
        // return view('bookings-admin.post-view', compact('post', 'comments'));
        return back()->with('success','Comment deleted successfully!');
    }

    public function decreasepost($post)
    {
        //
        
        $post = Tdbk::find($post);
        // dd($post);
        $post->rate = $post->rate - 1;
        $post->save();
        // $comments = Comments::where('post_id', '=', $post)->get();
        // $post = Tdbk::find($post);
        
        // dd($post);
        // return view('bookings-admin.post-view', compact('post', 'comments'));
        return back()->with('success','Priority reduced successfully!');
    }

    public function increasepost($post)
    {
        //
        
        $post = Tdbk::find($post);
        // dd($post);
        $post->rate = $post->rate + 1;
        $post->save();
        // $comments = Comments::where('post_id', '=', $post)->get();
        // $post = Tdbk::find($post);
        
        // dd($post);
        // return view('bookings-admin.post-view', compact('post', 'comments'));
        return back()->with('success','Priority increased successfully!');
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
            $input['rate'] = 0;
            $input['article'] = $request->input('editor2');

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

    public function delpost($post)
    {
        //
        // dd($post);
        Tdbk::destroy($post);
        return back()->with('success','post deleted successfully!');
    }
}
