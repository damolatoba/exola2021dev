@extends('front-end.fe-layout')

@section('content')
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none; height:450px; margin:auto;}
.mySlides2 {display: none; margin:auto;}
img {vertical-align: middle;}

.slid-img {
    max-width:100%;
    height: 100%;
    margin:auto;
}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  background-color: blue;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  /* padding: 4px 12px; */
  position: absolute;
  bottom: 0;
  width: 100%;
  text-align: center;
  /* background-color: blue; */
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 2;
  background-color: blue;
  border-radius: 50%;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 3.5s;
  animation-name: fade;
  animation-duration: 3.5s;
}

@-webkit-keyframes fade {
  from {opacity: 1} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: 1} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
  /* border-radius: 50%; */
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 4px;
  outline: none;
  font-size:small;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

.input-submit {
  width: 60%;
  margin: auto;
  padding: 4px;
  border: 0;
  background-color: dodgerblue;
}

.input-submit:hover {
    background-color: blue;
}

.maincom {
    background-color: #80b3ff;
    border-radius: 15px;
    margin: 0 0 10px 0;
    padding:15px;
}

.likelink {
    font-size:small;
}
</style>
    <!-- Top News Start-->
    <div class="top-news">
        <div class="container">
            <div class="row">
                @if(isset($today_book))
                <div class="col-md-12">
                    <div class="row tn-slider">
                        <div class="col-md-12" style="background-color:#9fbfdf;">
                        

                        <div class="slideshow-container">
                            <?php $ind = 0; ?>
                        @forelse($today_book as $book)
                        <?php $ind = $ind+1; ?>
                        <div class="mySlides">
                        <div class="numbertext">{{ $ind }} / {{ count($today_book) }}</div>
                        @if($book['file_type']== 'jpg' or $book['file_type']== 'jpeg' or $book['file_type']== 'png')
                            <img src="{{url('')}}/uploads/tdbooks/{{ $book->file_name }}" alt="{{ $book->caption }}" class="slid-img"/>
                        @else
                            <video height="100%" width="100%" controls loop>
                                <source src="{{url('')}}/uploads/tdbooks/{{ $book->file_name }}#t=0.7" type="video/{{ $book['file_type'] }}" class="slid-img">
                            Your browser does not support HTML video.
                            </video>
                        @endif
                        <div class="text"></div>
                        </div>

                        
                        @empty
                        @endforelse
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>

                        </div>

                        <br/>
                        <div style="text-align:center">
                        @for ($i = 1; $i <= count($today_book); $i++)
                        <span class="dot" onclick="currentSlide({{$i}})"></span> 
                        @endfor
                        </div>

                        <div class="slideshow-container">
                        @forelse($today_book as $book)
                        <div class="mySlides2" style="padding:15px;">
                            <h4>{{ $book->caption }}</h4>
                            <hr/>
                            <div class="comments">
                                <div class="maincom">
                                    <span><b>@instagram</b></span><br/>
                                    <span>Comment</span>
                                    <p><a class="float-right likelink" href="#">Reply</a><p>
                                </div>
                            </div>
                            <form id="deleteAliasName" class="ui form" action="/makecomment" method="post">
                            <div class="row comform">
                                <div class="col-md-3">
                                    <div class="input-container">
                                        <i class="fa fa-user icon"></i>
                                        <input class="input-field actname" type="text" placeholder="@instagram account" name="actname" require>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-container">
                                        <i class="fa fa-comment icon"></i>
                                        <input class="input-field commt" type="text" placeholder="Write a comment" name="commt" require>
                                        <input class="input-field postid" type="hidden" name="postid" value="{{ $book->id }}" require>
                                        <input class="input-field replyto" type="hidden" name="replyto" value="0" require>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-container">
                                        <!-- <i class="fa fa-comment icon"></i> -->
                                        <!-- <input class="input-submit" type="button" name="submit" value="Post Comment"> -->
                                        <a type="button" data-id="{{ $book->id }}" data-count="0" data-active="0" class="input-submit" style="text-align:center;">Post Comment</a>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>                        
                        @empty
                        @endforelse
                        </div>
                        <script>
                        var slideIndex = 1;
                        showSlides(slideIndex);

                        function plusSlides(n) {
                        showSlides(slideIndex += n);
                        }

                        function currentSlide(n) {
                        showSlides(slideIndex = n);
                        }

                        function showSlides(n) {
                        var i;
                        var slides = document.getElementsByClassName("mySlides");
                        var slides2 = document.getElementsByClassName("mySlides2");
                        var dots = document.getElementsByClassName("dot");
                        if (n > slides.length) {slideIndex = 1}    
                        if (n > slides2.length) {slideIndex = 1}    
                        if (n < 1) {slideIndex = slides.length}
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";  
                            slides2[i].style.display = "none";  
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex-1].style.display = "block";  
                        slides2[slideIndex-1].style.display = "block";  
                        dots[slideIndex-1].className += " active";
                        }
                        </script>
                        
                        </div>
                    </div>
                </div>
                @endif

                <!-- Article List -->
                @if(! $articles->isEmpty())
                <div class="col-md-12" style="padding:30px 10px;">
                    <hr/>
                    <h4>Follow us on Instagram: @Exola.TV</h4>
                    <div class="row">
                        <?php $count = 0; ?>
                        @forelse($articles as $article)
                            <div class="col-md-3" style="padding:10px">
                                <div class="tn-img art-link" data-id="{{ $article->id }}">
                                    <img src="{{url('')}}/uploads/articles_post/{{ $article->image_name }}" alt="{{ $article->title }}" style="width:100%;height:225px;">
                                    <div class="tn-title">
                                        <a href="/article/{{ $article->id }}">{{ $article->title }}</a>
                                    </div>
                                </div>
                                <p class="float-right" style="font-size:12px;margin:10px;">Posted: {{ \Carbon\Carbon::parse($article->created_at)->format('j F, Y') }}</p>
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
                @if(! $sprs_t->isEmpty() and $sprs_t->count() > 3)
                <div class="col-md-6">
                <h6>Savage Post & Response - Twitter</h6>
                    <div class="row cn-slider">
                        @forelse($sprs_t as $spr)
                            <div class="col-md-3">
                                <div class="cn-img">
                                    @if($spr['file_type']== 'jpg' or $spr['file_type']== 'jpeg' or $spr['file_type']== 'png')
                                    <img src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}"/>
                                    <div class="cn-title">
                                        <a href="">{{ $spr->caption }}</a>
                                    </div>
                                    @else
                                    <video width="100%" controls>
                                        <source src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}#t=0.1" type="video/{{ $spr['file_type'] }}" style="height:225px;">
                                    Your browser does not support HTML video.
                                    </video>
                                    <div class="">
                                    <i class="fa fa-film float-right" style="color:#e60000;font-size:24px;" aria-hidden="true"></i>
                                        <a href="" style="color:black;">{{ $spr->caption }}</a>
                                    </div>
                                    @endif
                                </div>
                                <p class="float-right" style="font-size:12px;margin:10px;">Posted: {{ \Carbon\Carbon::parse($spr->created_at)->format('j F, Y') }}</p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <hr/>
                </div>
                @endif
                

                @if(! $sprs_i->isEmpty() and $sprs_i->count() > 3)
                <div class="col-md-6">
                <h6>Savage Post & Response - Instagram</h6>
                    <div class="row cn-slider">
                        @forelse($sprs_i as $spr)
                            <div class="col-md-3">
                                <div class="cn-img">
                                    @if($spr['file_type']== 'jpg' or $spr['file_type']== 'jpeg' or $spr['file_type']== 'png')
                                    <img src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}"/>
                                    <div class="cn-title">
                                        <a href="">{{ $spr->caption }}</a>
                                    </div>
                                    @else
                                    <video width="100%" controls>
                                        <source src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}#t=0.1" type="video/{{ $spr['file_type'] }}">
                                    Your browser does not support HTML video.
                                    </video>
                                    @endif
                                    
                                </div>
                                <p class="float-right" style="font-size:12px;margin:10px;">Posted: {{ \Carbon\Carbon::parse($spr->created_at)->format('j F, Y') }}</p>
                                <!-- <div class="row" style="padding:5px;text-align:center;">
                                    <div class="col">
                                        <a type="button" style="color:grey;"><i class="fa fa-comments"></i> <span style="font-size:14px">0</span></a>
                                    </div>
                                    <div class="col">
                                    <a type="button" data-id="{{ $spr->id }}" data-count="0" data-active="0" style="color:grey;" class="like"><i class="fa fa-thumbs-up"></i> <span style="font-size:14px" class="countdisp">0</span></a>
                                    </div>
                                    <div class="col">
                                        <a type="button" data-id="{{ $spr->id }}" data-count="0" data-active="0" style="color:grey;" class="dislike"><i class="fa fa-thumbs-down"></i> <span style="font-size:14px" class="countdisp">0</span></a>
                                    </div>
                                </div> -->
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <hr/>
                </div>
                @endif

                @if(! $sprs_f->isEmpty() and $sprs_f->count() > 3)
                    <div class="col-md-6">
                    <h6>Savage Post & Response - Facebook</h6>
                        <div class="row cn-slider">
                            @forelse($sprs_f as $spr)
                                <div class="col-md-3">
                                    <div class="cn-img">
                                        @if($spr['file_type']== 'jpg' or $spr['file_type']== 'jpeg' or $spr['file_type']== 'png')
                                        <img src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}"/>
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
                                    <p class="float-right" style="font-size:12px;margin:10px;">Posted: {{ \Carbon\Carbon::parse($spr->created_at)->format('j F, Y') }}</p>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <hr/> 
                    </div>
                    @endif

                    <?php $sn = 0; ?>
                    @if(! $betcodes->isEmpty() and $betcodes->count() > 2)
                    <div class="col-md-6">
                    <h6>Bet9ja Booking Codes</h6>
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
                                <p class="float-right" style="font-size:12px;margin:10px;">Posted: {{ \Carbon\Carbon::parse($code->created_at)->format('j F, Y') }}</p>
                            </div>
                            @empty
                            @endforelse
                        </div>
                        <hr/>
                    </div>
                    @endif

            </div>
        </div>
    </div>
    <!-- Category News End-->

<script>

    
    
    $(".art-link").on("click", function(){
        var dataId = $(this).attr("data-id");
        window.location.replace("/article/"+dataId);
    });
    
    $(".copy-code").on("click", function(){
        // var dataId = $(this).attr("data-id");
        window.location.replace("/copy-code/");
    });
    
    $(".dislike").on("click", function(){
        // var inc_nums = [5,7,10];
        var dataId = $(this).attr("data-id");
        var dataActive = parseInt($(this).attr("data-active"));
        var dataCount = parseInt($(this).attr("data-count"));
        if(dataActive === 0){
            dataCount=dataCount + 1;
            $(this).attr("data-count", dataCount);
            $(this).attr("data-active", 1);
            $(this).css("color", "red");
            $(this).find(".countdisp").replaceWith('<span style="font-size:14px" class="countdisp">'+dataCount+'</span>');
        }else{
            dataCount=dataCount - 1;
            $(this).attr("data-count", dataCount);
            $(this).attr("data-active", 0);
            $(this).css("color", "grey");
            $(this).find(".countdisp").replaceWith('<span style="font-size:14px" class="countdisp">'+dataCount+'</span>');
        }
    });
    
    
    $(".like").on("click", function(){
        var inc_nums = [5,7,10];
        var dataId = $(this).attr("data-id");
        var dataActive = parseInt($(this).attr("data-active"));
        var dataCount = parseInt($(this).attr("data-count"));
        if(dataActive === 0){
            dataCount=dataCount + inc_nums[Math.floor(Math.random() * inc_nums.length)];
            $(this).attr("data-count", dataCount);
            $(this).attr("data-active", 1);
            $(this).css("color", "#1d31ad");
            $(this).find(".countdisp").replaceWith('<span style="font-size:14px" class="countdisp">'+dataCount+'</span>');
        }else{
            dataCount=dataCount - 1;
            $(this).attr("data-count", dataCount);
            $(this).attr("data-active", 0);
            $(this).css("color", "grey");
            $(this).find(".countdisp").replaceWith('<span style="font-size:14px" class="countdisp">'+dataCount+'</span>');
        }
    });

    $(".input-submit").on("click", function(){
        // headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        // }
        // var formcontent = $(this).attr("data-id");
        // var commt = $(this).closest("p").text()
        let username = $(this).closest("div.comform").find('input.actname').val();
        let commt = $(this).closest("div.comform").find('input.commt').val();
        // let _token   = $('meta[name="csrf-token"]').attr('content');
        


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/makecomment",
            data:{
                username:username,
                comment:commt
            },
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend : function(username)
            {
                console.log(username);
            },
            success: function (data) { 
                console.log("Success");
            },
            error: function(data){
                console.log('failed');
            }
        });

        // var myKeyVals = { name : username, comment : commt }



        // var saveData = $.ajax({
        //     type: 'POST',
        //     url: "/makecomment",
        //     data: myKeyVals,
        //     dataType: "text",
        //     success: function(resultData) { alert("Save Complete") }
        // });
        // alert(commt);
        // commt = '';
        // $('.formcontent').find('.commt').val('');
        $(this).closest('div.mySlides2').find( "div.comments" ).prepend( '<div class="maincom"><span><b>@'+username+'</b></span><br/><span>'+commt+'</span></div>' );
    });
    // $( ".comments" ).prepend( '<div class="maincom"><span><b>@instagram</b></span><br/><span>Comment One</span></div>' );
</script>
@endsection('content')