@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center " style="height: 70vh;S">
        <div class="col-md-12">
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
                    <div class="row">
                    <div class="col-md-8">
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
                                        Login with Google Authenticator
                                    </button>
                                    <?php
                                    if(Route::current()->getName() === 'home')
                                    {  
                                    ?> 
                                        <button type="button" class="btn btn-primary btn_hideshow">Show QR Code</button>
                                    <?php
                                    }
                                    ?> 
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">                        
                        <div class="d-none qr_show">
                            <p>Please scan this QR Code For Login With Google Authenticator App.</p>       
                            <?php
                            if(Route::current()->getName() === 'home')
                            {  
                            ?> 
                                 {!! $QR_Image !!}
                            <?php                                                         
                            }                            
                            ?> 
                            
                            <p>Download Google Authenticator App.</p>  
                            <div class="col-md-8">
                            <a target="_blank" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&pli=1" class="">
                                <img src="/playstore.png"/>
                            </a>
                            <a target="_blank" href="https://apps.apple.com/us/app/google-authenticator/id388497605" class="">
                                <img src="/appstore.png"/>
                            </a>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
                <br>
                <strong>OR</strong>
                <div class="card-body col-md-6">
                    <form method="POST" action="{{ route('otp.generate') }}">
                        @csrf
                        <br><br>
                            <label for="mobile_no" class="col-md-4 col-form-label text-md-right">Login With OTP</label>
                            <div class="col-md-6">
                                <input class="form-control" name="mobile_no" type="text" placeholder="Enter your mobile no" value="{{ old('mobile_no') }}" required>

                                @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							
							<br>
							<button type="submit" class="btn btn-primary">Send OTP</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection