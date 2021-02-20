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
</style>
@section('content')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Article </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post-article') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">

                        <div class="col-md-12">
                        <!-- <label for="title" class="col-md-12 col-form-label">{{ __('Article Title') }}</label> -->
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Article Title" value="" required autocomplete="title">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <label for="artpost" class="col-md-3 col-form-label">{{ __('Change Image') }}</label>
                        <div class="col-md-9">
                            <input id="artpost" type="file" class="form-control @error('artpost') is-invalid @enderror" name="artpost" placeholder="Upload Image" value="{{ old('artpost') }}" autofocus>

                            @error('artpost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                        <!-- <label for="artpost" class="col-md-12 col-form-label">{{ __('Article') }}</label> -->
                        <textarea name="editor2" required>
                        Text here...
                        </textarea>
                            <script>
                                    CKEDITOR.replace( 'editor2' );
                            </script>

                            @error('artpost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 offset-md-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Article') }}
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
