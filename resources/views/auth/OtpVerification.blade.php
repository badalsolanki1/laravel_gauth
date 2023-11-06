
<div class="container">   
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('success') }}
        </div>
    @endif    
    
    <form method="POST" action="{{ route('otp.getlogin') }}">
        @csrf
        <input name="user_id" type="hidden" value="{{ $user_id }}">

        <label for="">OTP</label>
        <br>
        <input name="otp" type="text" placeholder="Enter OTP" value="{{ old('otp') }}" required>
        <br>
        @error('otp')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <br>
        <button type="submit">Login</button>
    </form>
</div>
