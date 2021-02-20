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
                <div class="card-header">Post Booking Code </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('create-code') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">

                        <div class="col-md-9">
                        <!-- <label for="title" class="col-md-12 col-form-label">{{ __('Article Title') }}</label> -->
                            <input id="betcode" type="text" class="form-control @error('betcode') is-invalid @enderror" name="betcode" placeholder="Bet9ja Code" value="" required autocomplete="betcode">

                            @error('betcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                        <!-- <label for="title" class="col-md-12 col-form-label">{{ __('Article Title') }}</label> -->
                            <input id="odds" type="text" class="form-control @error('odds') is-invalid @enderror" name="odds" placeholder="Total Odds" value="" required autocomplete="odds">

                            @error('odds')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="seldiv" id="seldiv">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="hometeam[]" placeholder="Home Team" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="awayteam[]" placeholder="Away Team" required>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="selection[]" placeholder="Selection" required>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary btn-sm" id="add-option-field">+</button>
                        </div>
                    </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 offset-md-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Post Betting Code') }}
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="form-group row"><div class="col-md-4"><input type="text" class="form-control" name="artpost" placeholder="Home Team" required></div><div class="col-md-4"><input type="text" class="form-control" name="artpost" placeholder="Away Team" required></div><div class="col-md-3"></div><div class="col-md-1"><button type="button" class="btn btn-primary btn-sm" onclick="appendText()">+</button></div></div> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
$('#add-option-field').on('click', function() {
    var addDiv = $('#seldiv');
    $('<div class="form-group row othersel"><div class="col-md-4"><input type="text" class="form-control" name="hometeam[]" placeholder="Home Team" required></div><div class="col-md-4"><input type="text" class="form-control" name="awayteam[]" placeholder="Away Team" required></div><div class="col-md-4"><input type="text" class="form-control" name="selection[]" placeholder="Selection" required></div></div>').appendTo(addDiv);
})
// $('.rem_form').on('click', function() {
//     alert('clocked');
//     // $(this).closest("div.othersel").remove();
// })
</script>

@endsection
