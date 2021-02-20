<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Exola TV</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Exola" name="keywords">
    <meta content="Exola" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Nav Bar Start -->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">

                <button type="button" class="navbar-toggler" style="background-color: black" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <a href="#" class="navbar-brand" style="text-align: center">EXOLA</a>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">About Exola</a>
                        <a href="#" class="nav-item nav-link">Music</a>
                        <a href="#" class="nav-item nav-link">Archives</a>
                        <a href="#" class="nav-item nav-link">Savage Post</a>
                    </div>
                    <div class="social ml-auto">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Top News Start-->
    <div class="top-news">
        <div class="container">
            <div class="row">
                @if(isset($today_book))
                <div class="col-md-12">
                    <div class="row tn-slider">
                        <div class="col-md-12">
                            <div class="tn-img">
                                @if($today_book['file_type']== 'jpg' or $today_book['file_type']== 'jpeg' or $today_book['file_type']== 'png')
                                <img src="{{url('')}}/uploads/tdbooks/{{ $today_book->file_name }}" alt="{{ $today_book->caption }}" />
                                @else
                                <video width="100%" controls autoplay muted loop>
                                    <source src="{{url('')}}/uploads/tdbooks/{{ $today_book->file_name }}" type="video/{{ $today_book['file_type'] }}">
                                Your browser does not support HTML video.
                                </video>
                                @endif
                                <div class="tn-title">
                                    <a href="">{{ $today_book->caption }}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Article List -->
                @if(! $articles->isEmpty() and $articles->count() > 3)
                <div class="col-md-12" style="padding:30px 10px;">
                    <hr/>
                    <h4>Follow us on Instagram: @Exola.TV</h4>
                    <div class="row">
                        <?php $count = 0; ?>
                        @forelse($articles as $article)
                            <div class="col-md-3" style="padding:10px">
                                <div class="tn-img">
                                <img src="{{url('')}}/uploads/articles_post/{{ $article->image_name }}" alt="{{ $article->title }}" style="max-width:auto;height:175px;">
                                    <div class="tn-title">
                                        <a href="#">{{ $article->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <a href="" type="button" class="btn btn-primary float-right btn-sm">All News</a>
                    <br/>
                    <hr/>
                </div>
                @endif


            </div>
        </div>
    </div>
    <!-- Top News End-->

    <!-- Category News Start-->
    <div class="cat-news">
        <div class="container">
            <div class="row" style="padding:10px;">
                <div class="col-md-6">
                <h6>Savage Post & Response - Twitter</h6>
                    @if(! $sprs_t->isEmpty() and $sprs_t->count() > 3)
                        <div class="row cn-slider">
                            @forelse($sprs_t as $spr)
                                <div class="col-md-3">
                                    <div class="cn-img">
                                        @if($spr['file_type']== 'jpg' or $spr['file_type']== 'jpeg' or $spr['file_type']== 'png')
                                        <img src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}" style="height:175px;"/>
                                        <div class="cn-title">
                                            <a href="">{{ $spr->caption }}</a>
                                        </div>
                                        @else
                                        <video width="100%" controls>
                                            <source src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}#t=0.1" type="video/{{ $spr['file_type'] }}" style="height:175px;">
                                        Your browser does not support HTML video.
                                        </video>
                                        <div class="">
                                        <i class="fa fa-film float-right" style="color:#e60000;font-size:24px;" aria-hidden="true"></i>
                                            <a href="" style="color:black;">{{ $spr->caption }}</a>
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <hr/>
                    @else
                        <div class="row">
                            <div style="font-size:15px;padding:30px;"><p style="color:#e60000;">No savage post or response from twitter at the moment. Please check back later...</p></div>
                        </div>
                    @endif
                </div>

                <div class="col-md-6">
                    <h6>Savage Post & Response - Instagram</h6>
                    @if(! $sprs_i->isEmpty() and $sprs_i->count() > 3)
                        <div class="row cn-slider">
                            @forelse($sprs_i as $spr)
                                <div class="col-md-3">
                                    <div class="cn-img">
                                        @if($spr['file_type']== 'jpg' or $spr['file_type']== 'jpeg' or $spr['file_type']== 'png')
                                        <img src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}" style="height:175px;" />
                                        <div class="cn-title">
                                            <a href="">{{ $spr->caption }}</a>
                                        </div>
                                        @else
                                        <video width="100%" controls>
                                            <source src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}#t=0.1" type="video/{{ $spr['file_type'] }}">
                                        Your browser does not support HTML video.
                                        </video>
                                        <div class="">
                                        <i class="fa fa-film float-right" style="color:#e60000;font-size:24px;" aria-hidden="true"></i>
                                            <a href="" style="color:black;">{{ $spr->caption }}</a>
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <hr/>
                    @else
                        <div class="row">
                            <div style="font-size:15px;padding:30px;"><p style="color:#e60000;">No savage post or response from instagram at the moment. Please check back later...</p></div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <!-- Category News End-->

    <!-- Category News Start-->
    <div class="cat-news">
        <div class="container">
            <div class="row">

            <div class="col-md-6">
                    <h6>Savage Post & Response - Facebook</h6>
                    @if(! $sprs_f->isEmpty() and $sprs_f->count() > 3)
                        <div class="row cn-slider">
                            @forelse($sprs_f as $spr)
                                <div class="col-md-3">
                                    <div class="cn-img">
                                        @if($spr['file_type']== 'jpg' or $spr['file_type']== 'jpeg' or $spr['file_type']== 'png')
                                        <img src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}" style="height:175px;" />
                                        <div class="cn-title">
                                            <a href="">{{ $spr->caption }}</a>
                                        </div>
                                        @else
                                        <video width="100%" controls>
                                            <source src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}" type="video/{{ $spr['file_type'] }}">
                                        Your browser does not support HTML video.
                                        </video>
                                        <div class="">
                                        <i class="fa fa-film float-right" style="color:#e60000;font-size:24px;" aria-hidden="true"></i>
                                            <a href="" style="color:black;">{{ $spr->caption }}</a>
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <hr/>
                    @else
                        <div class="row">
                            <div style="font-size:15px;padding:30px;"><p style="color:#e60000;">No savage post or response from facebook at the moment. Please check back later...</p></div>
                        </div>
                    @endif
                </div>


                <div class="col-md-6">
                    <h6>Bet9ja Booking Codes</h6>
                    <?php $sn = 0; ?>
                    @if(! $betcodes->isEmpty() and $betcodes->count() > 2)
                    <div class="row cn-slider">
                        @forelse($betcodes as $code)
                        <?php $sn = $sn+1; ?>
                        <div class="col-md-3">
                            <div class="bet-div">
                                <p class="float-right bet-font"><b>{{ $code->bet_code }} | {{ $code->odds }}</b></p>
                                <p><b>{{ $sn }}</b></p>
                                <hr/>
                                @foreach($betselections->where('bet_id', $code->id) as $select)
                                    <div>
                                        <p class="float-right bet-font">{{ $select->selection }}<p>
                                        <p class="bet-font">{{ $select->home }}  <b>-</b>  {{ $select->away }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    <hr/>
                    @else
                        <div class="row">
                            <div style="font-size:15px;padding:30px;"><p style="color:#e60000;">Booking codes yet to be posted today.</p></div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <!-- Category News End-->

    <!-- Footer Start -->
    <div class="#" style="background-color: cadetblue;height:32px;">
    </div>
    <!-- Footer End -->

    <!-- Footer Menu Start -->
    <div class="footer-menu">
        <div class="container">
            <div class="f-menu">
                <a href="">Home</a>
                <a href="">About Exola</a>
                <a href="">Music</a>
                <a href="">Archives</a>
                <a href="">Savage Post</a>
            </div>
        </div>
    </div>
    <!-- Footer Menu End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 copyright" style="text-align: center;">
                    <p>Copyright &copy; <a href="#">Exola Inc</a>. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>