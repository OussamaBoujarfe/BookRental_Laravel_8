@extends('layouts.app')

@section('content')

<div class="main">

<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input placeholder = "Name" type="text" class=" @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>


                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input placeholder = "Email" type="email" class=" @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email"/>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input placeholder = "Password" type="password" class="@error('password') is-invalid @enderror" name="password" id="pass" required autocomplete="new-password"/>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input placeholder = "Confirm Password" id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-group ">
                    <select disabled  class="form-select @error('is_librarian') is-invalid @enderror" aria-label="Default select example">
                          <option selected>I am a ..</option>
                          <option value="1">Librarian</option>
                          <option value="0">reader</option>
                    </select>
                    <input type="hidden" name="is_librarian" value="0">
                    @error('is_librarian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>      
                   
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="LogReg/images/signup-image.jpg" alt="sing up image"></figure>
                <a href="{{ url('/login') }}" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>



</div>

@endsection
