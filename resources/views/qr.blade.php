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
                <p>Please scan this QR Code For Login With Google Authenticator App.</p>
                <div class="col-md-8">
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&pli=1" class="">
                    <img src="/playstore.png"/>
                </a>
                <a target="_blank" href="https://apps.apple.com/us/app/google-authenticator/id388497605" class="">
                    <img src="/appstore.png"/>
                </a>
                </div>
                {!! $QR_Image !!}
                </div>
                <div>
                    <a href="{{ route('verify') }}" class=""><button class="btn btn-primary" type="button">Login With Google Authenticator</button></a>
                    
                </div>
                <br>
                <strong>OR</strong>
                <div class="card-body col-md-6">
                    <form method="POST" action="{{ route('otp.generate') }}">
                        @csrf
                        <br><br>
                            <label for="mobile_no" class="col-md-8 col-form-label text-md-right">Login With OTP (Enter Mobile Number with Country code)</label>

                            <div class="col-md-6">
                                <input name="mobile_no" type="text" placeholder="Enter your mobile no" value="{{ old('mobile_no') }}" required>

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