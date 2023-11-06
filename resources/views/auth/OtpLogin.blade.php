
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login With Mobile</div>
				@if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('otp.generate') }}">
                        @csrf

                       
                            <label for="mobile_no" class="col-md-4 col-form-label text-md-right">Enter Mobile</label>

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
                </div>
            </div>
        </div>
    </div>
</div>
