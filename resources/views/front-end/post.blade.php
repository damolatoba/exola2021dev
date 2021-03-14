@extends('front-end.fe-layout')

@section('content')
<!-- Single News Start-->
<div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sn-container">
                        <div class="sn-img">
                            <img src="{{url('')}}/uploads/tdbooks/{{ $post->file_name }}" />
                        </div>
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-format="fluid"
                             data-ad-layout-key="-7g+f1-16-4w+d9"
                             data-ad-client="ca-pub-7683492974181822"
                             data-ad-slot="9326624244"></ins>
                        <script>
                             (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle"
                             style="display:block; text-align:center;"
                             data-ad-layout="in-article"
                             data-ad-format="fluid"
                             data-ad-client="ca-pub-7683492974181822"
                             data-ad-slot="9333722477"></ins>
                        <script>
                             (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        <div class="sn-content">
                            <h1 class="sn-title">{{ $post->caption }}</h1>
                            <p>
                                {!! $post->article !!}
                            </p>
                            <p class="float-right" style="font-family:calibri;font-size:14px;"><i><b>{{ $post->views }} Views</b></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2 class="sw-title">In This Category</h2>
                            <div class="news-list">
                                @forelse($articles as $art)
                                <!-- @if($art->id != $post->id) -->
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="{{url('')}}/uploads/articles_post/{{ $art->image_name }}" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="/article/{{ $art->id }}">{{ $art->title }}</a>
                                    </div>
                                </div>
                                <!-- @endif -->
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