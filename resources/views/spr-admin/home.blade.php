<style>
.col {
  display: table-cell;
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
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
  max-width: 40%;
  text-align: center;
}
.close {
    text-align: right;
}
</style>
<div id="postmod" class="modal">

<!-- Modal content -->
  <div class="modal-content">
      <span class="close">&times;</span>
      <h2 style="color:#800000;">Post Savages</h2>
      <form method="POST" action="{{ route('upload-post') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">

            <div class="col-md-12">
            <label for="savpost" class="col-md-12 col-form-label">{{ __('Upload Savage Post Video or Image') }}</label>
                <input id="savpost" type="file" class="form-control @error('file') is-invalid @enderror" name="savpost" value="{{ old('savpost') }}" required autofocus>

                @error('savpost')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">

            <div class="col-md-12">
            <label for="social_media" class="col-md-12 col-form-label">{{ __('Social Media') }}</label>
            <select name="social_media" class="form-control" required>
                <option>Select Social Media</option>
                <option value="Twitter">Twitter</option>
                <option value="Instagram">Instagram</option>
                <option value="Facebook">Facebook</option>
            </select>

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">

            <div class="col-md-12">
            <label for="caption" class="col-md-12 col-form-label">{{ __('Caption Post') }}</label>
                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" placeholder="Caption" value="{{ old('caption') }}" autocomplete="caption">

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12 offset-md-12">
                <button type="submit" class="btn btn-primary">
                    {{ __('Upload') }}
                </button>
            </div>
        </div>
    </form>
  </div>  

</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card butdiv" style="padding:10px 0">
                <button type="button" class="btn btn-secondary btn-sm" id="popmod">Post SM Savages</button>
            </div>
            <br/>
            @include('admin-includes.spr-display')
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