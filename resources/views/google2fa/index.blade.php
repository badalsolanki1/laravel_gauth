@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center " style="height: 70vh;S">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               
                <hr>
                @if($errors->any())
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                          <strong>{{$errors->first()}}</strong>
                        </div>
                    </div>
                @endif
  
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('2fa') }}">
                        {{ csrf_field() }}
  
                        <div class="form-group">
                            <p>Please enter the  <strong>OTP</strong> generated on your Authenticator App. <br> Ensure you submit the current one because it refreshes every 30 seconds.</p>
                            <label for="one_time_password" class="col-md-4 control-label">One Time Password</label>
  
                            <div class="col-md-6">
                                <input id="one_time_password" type="number" class="form-control" name="one_time_password" required autofocus>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Login with 2fa
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
               <!-- <strong>OR</strong>
                <div class="card-body">
                    <form method="POST" action="{{ route('otp.generate') }}">
                        @csrf
                        <br><br>
                            <label for="mobile_no" class="col-md-4 col-form-label text-md-right">Login With OTP</label>

                            <div class="col-md-6">
                                <input name="mobile_no" type="text" placeholder="Enter your mobile no" value="{{ old('mobile_no') }}" required>

                                @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							
							<br>
							<button type="submit">Generate OTP</button>
                        
                    </form>
                </div>-->
            </div>
        </div>
    </div>
</div>
@endsection