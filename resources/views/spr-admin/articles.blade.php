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
<div id="postmod" class="modal">

<!-- Modal content -->
<div class="modal-content">
    <span class="close">&times;</span>
    <p style="color:#800000;">Post Savages</p>
    <form method="POST" action="{{ route('post-article') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">

            <div class="col-md-12">
            <!-- <label for="title" class="col-md-12 col-form-label">{{ __('Article Title') }}</label> -->
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Article Title" value="{{ old('title') }}" required autocomplete="title">

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">

            <label for="artpost" class="col-md-3 col-form-label">{{ __('Upload Image') }}</label>
            <div class="col-md-9">
                <input id="artpost" type="file" class="form-control @error('artpost') is-invalid @enderror" name="artpost" placeholder="Upload Image" value="{{ old('artpost') }}" required autofocus>

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
            <textarea name="editor4" required>Article here</textarea>
                <script>
                        CKEDITOR.replace( 'editor4' );
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
                    {{ __('Upload Article') }}
                </button>
            </div>
        </div>
    </form>
  </div>  

</div>

<!-- <p style="text-align:center;color:red;font-size:15px;"><b>Note:</b> Minimum of four (4) articles for the articles section to display on the home page.</p> -->

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card butdiv" style="padding:10px 0">
            <a type="button" href="/articles/new-article" class="btn btn-secondary btn-sm" >Post Exola Article</a>
        </div>
        <br/>
        <div class="card">
            <div class="card">
                <div class="card-header">Exola Articles</div>

                <div class="card-body">
                @forelse($articles as $article)
                    <div class="row">
                        <div class="col-md-3" style="height:100px;">
                            <img src="{{url('')}}/uploads/articles_post/{{ $article->image_name }}" alt="{{ $article->title }}" style="max-width:100%;max-height:100%;">
                            <div style="padding:5px;">
                            <a class="btn btn-secondary btn-sm float-left" href="/article/uprank/{{ $article->id }}">+</a>
                            <a class="btn btn-secondary btn-sm float-right" href="/article/downrank/{{ $article->id }}">-</a>
                            </div>
                        </div>
                        <div class="col-md-9" style="font-size:12px;">
                            <h4>{{ $article->title }}</h4>
                            <p>{!! substr($article->content, 0, 150) !!} <span>....</span></p>
                                <a class="btn btn-secondary btn-sm float-left" href="/article/delete/{{ $article->id }}">Delete</a>
                                <a class="btn btn-secondary btn-sm float-right" href="/article/edit/{{ $article->id }}">Edit</a>
                        </div>
                    </div>
                    <br/>
                    <hr/>
                    <br/>
                @empty
                    <p>No Articles</p>
                @endforelse
                    
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>
  $("#popmod").on("click", function(){
          $('#postmod').css("display", "block");
  });

  $(".close").on("click", function(){
          $('#postmod').css("display", "none");
  });
</script>
@endsection
