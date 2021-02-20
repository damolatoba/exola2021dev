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

.btn {
    padding:2px;
    color:red;
}
</style>
@section('content')

<div id="delmod" class="modal">

<!-- Modal content -->
  <div class="modal-content">
      <span class="close">&times;</span>
      <h2 style="color:#800000;">Please Confirm</h2>
      <p>Are you sure you want to delete the account of <span id="user_name" style="text-transform: capitalize;color:#cc0000;font-weight:600;"></span></p>
      <form action="{{ route('delete-admin') }}" method="POST">
      @csrf
          <input type="hidden" name="user_id" id="user_id"/>
          <input type="submit" name="submit" value="Delete"/>
      </form>
  </div>  

</div>


<div id="createmodal" class="modal">

<!-- Modal content -->
  <div class="modal-content">
      <span class="close">&times;</span>
      <h6>Fill Form To Create Administrator Account<h6>
                          <br/>
                        <form method="POST" action="{{ route('register-admin') }}">
                              @csrf

                              <div class="form-group row">

                                  <div class="col-md-12">
                                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Administrator Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">

                                  <div class="col-md-12">
                                      <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}" required autocomplete="username">

                                      @error('username')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">

                                  <div class="col-md-12">
                                      <select name="class" id="class" class="form-control" name="class" required>
                                        <option>Account Type</option>
                                        <option value="b">Bookings Admin</option>
                                        <option value="c">SP&R Admin</option>
                                      </select>

                                      @error('class')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">

                                  <div class="col-md-12">
                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                      @error('password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">

                                  <div class="col-md-12">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                  </div>
                              </div>

                              <div class="form-group row mb-0">
                                  <div class="col-md-12 offset-md-12">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Register') }}
                                      </button>
                                  </div>
                              </div>
                        </form>
  </div>  

</div>

<div class="container-fluid">
  <div class="row justify-content-center">
      <div class="col-md-8">
          
          <div class="card">
              <div class="card-header"><button type="button" class="btn btn-secondary btn-sm float-right create_accnt" id="create_accnt">Register Account</button> Booking Administrator Accounts </div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
                  <div class="row" style="text-align:center;">
                      <div class="col-md-12">
                      @if ($booking_users->isEmpty())
                          No registered Administrator.
                      @else
                      <table id="customers">
                          <tr>
                              <th>Fullname</th>
                              <th>Username</th>
                              <th>Delete Account</th>
                          </tr>
                          @foreach ($booking_users as $user)
                          <tr>
                              <td><p>{{ $user['name'] }}</p></td>
                              <td><p>{{$user->username}}</p></td>
                              <td><button type="button" data-id="{{ $user->id }}" data-name="{{ $user->name }}" class="btn btn-secondary btn-sm del_accnt" id="del_accnt">Delete</button></td> 
                          </tr>
                          @endforeach
                      </table>
                      @endif
                      </div>
                  </div>
                  
              </div>
          </div>

          <br/>

          <div class="card">
              <div class="card-header"><button type="button" class="btn btn-secondary btn-sm float-right create_accnt" id="create_accnt">Register Account</button> SP&R Administrator Accounts </div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
                  <div class="row" style="text-align:center;">
                      <div class="col-md-12">
                      @if ($spr_users->isEmpty())
                          No registered Administrator.
                      @else
                      <table id="customers">
                          <tr>
                              <th>Fullname</th>
                              <th>Username</th>
                              <th>Delete Account</th>
                          </tr>
                          @foreach ($spr_users as $user)
                          <tr>
                              <td><p>{{ $user['name'] }}</p></td>
                              <td><p>{{$user->username}}</p></td>
                              <td><button type="button" data-id="{{ $user->id }}" data-name="{{ $user->name }}" class="btn btn-secondary btn-sm del_accnt" id="del_accnt">Delete</button></td> 
                          </tr>
                          @endforeach
                      </table>
                      @endif
                      </div>
                  </div>
                  
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

  $(".close").on("click", function(){
          $('#delmod').css("display", "none");
          $('#createmodal').css("display", "none");
  });
</script>

@endsection
