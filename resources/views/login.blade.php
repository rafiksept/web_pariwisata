<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Travel</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form action="{{ route('actionLogin') }}" method="post">
        @csrf
        @if (session('error'))
        <p class="error-login">{{ session('error') }}</p>
        @endif
        @if (count($errors) > 0)
     <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
          <p class="error-login">{{ $error }}</p>
          
          @endforeach
     </div>
     @endif
        <div class="txt_field">
          <input type="email" name="email" required >
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="{{url('/register')}}">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
