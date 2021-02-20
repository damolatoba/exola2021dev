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
  padding-top: 13px; /* Location of the box */
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

.modal-content2 {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  text-align: center;
}
.close {
    text-align: right;
}
</style>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<div id="createmodal" class="modal">

  <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h6>Upload Today's Booking<h6>
            <br/>
            <form method="POST" action="{{ route('create-tdbook') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">

                    <div class="col-md-12" style="padding:25px 10px;">
                    <input id="bookpost" type="file" class="form-control @error('bookpost') is-invalid @enderror" name="bookpost" placeholder="Upload Image" value="{{ old('bookpost') }}" required autofocus>

                        @error('bookpost')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12" style="padding:25px 10px;">
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" placeholder="Caption" value="{{ old('caption') }}" required autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Upload Booking') }}
                        </button>
                    </div>
                </div>
            </form>
    </div>  

</div>

<div id="copymodal" class="modal">

  <!-- Modal content -->
    <div class="modal-content2">
        <span class="close">&times;</span>
        <h6>Upload Booking codes for copy<h6>
            <br/>
            <form method="POST" action="{{ route('create-booking-copy') }}">
                @csrf

                <div class="form-group row">

                    <div class="col-md-12">
                    <!-- <label for="artpost" class="col-md-12 col-form-label">{{ __('Article') }}</label> -->
                    <textarea name="editor4" required>Booking codes for copy here</textarea>
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

                <div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Upload Booking') }}
                        </button>
                    </div>
                </div>
            </form>
    </div>  

</div>

<p style="text-align:center;color:red;font-size:15px;"><b>Note:</b> Today's booker header section will be invisibe to users if empty.</p>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-secondary btn-sm float-right create_accnt" id="create_accnt">Add</button>
                     Today's Booking
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if( isset($today_book) )
                    <div class="row">
                        @forelse($today_book as $book)
                        <div class="col-md-3">
                            @if($book['file_type']== 'jpg' or $book['file_type']== 'jpeg' or $book['file_type']== 'png')
                                <img src="{{url('')}}/uploads/tdbooks/{{ $book->file_name }}" style="width:100%;" />
                            @else
                                <video width="100%" controls>
                                    <source src="{{url('')}}/uploads/tdbooks/{{ $book->file_name }}" type="video/{{ $book['file_type'] }}">
                                Your browser does not support HTML video.
                                </video>
                            @endif
                            
                            <p>{{ $book->caption }}</p>
                            <a type="button" href="#" class="btn btn-secondary btn-sm float-right">Info</a>
                        </div>
                        @empty
                        @endforelse
                    </div>
                        
                    @else
                        Today's bookings yet to be posted.
                    @endif
                </div>
            </div>

            <br/>
            
            <!-- <p style="text-align:center;color:red;font-size:15px;"><b>Note:</b> Minimum of three (3) booking codes for booking codes section to display on the home page</p> -->
            <div class="card">
                <div class="card-header"><button type="button" id="post_copy" class="btn btn-secondary btn-sm float-right post_copy">Paste new codes for copy</button> Bet9ja Booking Codes for copy</div>

                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if( isset($copy_post) )
                    {!! $copy_post->content !!}
                @else
                    Bet9ja codes for copy yet to be posted today.
                @endif
                </div>
            </div>

            <br/>

            <p style="text-align:center;color:red;font-size:15px;"><b>Note:</b> Minimum of three (3) booking codes for booking codes section to display on the home page</p>
            <div class="card">
                <div class="card-header"><a type="button" href="/create-booking" class="btn btn-secondary btn-sm float-right">Add Bet9ja Code</a> Bet9ja Booking Codes</div>

                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if(! $betcodes->isEmpty() )
                    <?php $sn = 0; ?>
                    <div class="row cn-slider">
                        @forelse($betcodes as $code)
                        <div class="col-md-4" style="padding:25px;">
                            <div style="height:175px;overflow:auto;">
                                <p class="float-right bet-font"><a type="button" href="/delete-booking/{{ $code->id}}" class="btn btn-secondary btn-sm float-right">Delete</a></p>
                                <p>{{ $code->bet_code }} | {{ $code->odds }}</p>
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
                @else
                    Bet9ja codes yet to be posted today.
                @endif
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(".del_accnt").on("click", function(){
            $('#delmod').css("display", "block");
            var dataId = $(this).attr("data-id");
            var dataName = $(this).attr("data-name");
            $('#user_id').val(dataId);
            $('#user_name').text(dataName);
    });

    $(".create_accnt").on("click", function(){
            $('#createmodal').css("display", "block");
    });

    $(".post_copy").on("click", function(){
            $('#copymodal').css("display", "block");
            // alert('yes');
    });

    $(".close").on("click", function(){
            $('#delmod').css("display", "none");
            $('#createmodal').css("display", "none");
            $('#copymodal').css("display", "none");
    });
</script>