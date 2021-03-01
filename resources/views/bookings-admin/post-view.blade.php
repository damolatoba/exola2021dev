@extends('layouts.app')
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 3px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  text-align: left;
  background-color: #666666;
  color: white;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 3px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  max-width: 80%;
  text-align: center;
}
.close {
    text-align: right;
}

.maincom {
    background-color: #80b3ff;
    border-radius: 15px;
    margin: 0 0 10px 0;
    padding:15px;
}
</style>
@section('content')
<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post-> caption }} </div>

                <div class="card-body">
                    @if($post['file_type']== 'jpg' or $post['file_type']== 'jpeg' or $post['file_type']== 'png')
                        <img src="{{url('')}}/uploads/tdbooks/{{ $post->file_name }}" style="width:100%;" />
                    @else
                        <video width="100%" controls>
                            <source src="{{url('')}}/uploads/tdbooks/{{ $post->file_name }}" type="video/{{ $post['file_type'] }}">
                        Your browser does not support HTML video.
                        </video>
                    @endif
                </div>
                <div class="card-body">
                    <h4>Comments</h4>
                    @foreach($comments as $comment)
                    <div class="maincom">
                      <a href="/post/delete/{{ $comment->id }}" class="btn btn-danger float-right" role="button">Delete Comment</a>
                      <h5>{{ $comment->username }}</h5>
                      <p>{{ $comment->comment }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
