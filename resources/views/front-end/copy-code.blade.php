@extends('front-end.fe-layout')

@section('content')
<style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<!-- Single News Start-->
<div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sn-container">
                        <div class="tn-img">
                            @if($today_book['file_type']== 'jpg' or $today_book['file_type']== 'jpeg' or $today_book['file_type']== 'png')
                            <img src="{{url('')}}/uploads/tdbooks/{{ $today_book->file_name }}" alt="{{ $today_book->caption }}" />
                            @else
                            <video width="100%" controls autoplay loop>
                                <source src="{{url('')}}/uploads/tdbooks/{{ $today_book->file_name }}#t=0.3" type="video/{{ $today_book['file_type'] }}">
                            Your browser does not support HTML video.
                            </video>
                            @endif
                            <div class="tn-title">
                                <a href="">{{ $today_book->caption }}</a>
                            </div>

                        </div>
                        <div class="sn-content">
                            <h3 class="sn-title">Follow us on Instagram: @Exola.TV</h3>
                            <p>
                                {!! $copy_post->content !!}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2 class="sw-title">In This Category</h2>
                            <div class="news-list">
                                @forelse($articles as $art)
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="{{url('')}}/uploads/articles_post/{{ $art->image_name }}" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="/article/{{ $art->id }}">{{ $art->title }}</a>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Single News End-->
    @endsection('content')