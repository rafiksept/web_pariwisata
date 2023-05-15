<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Travel</title>
    <link href="{{ asset('css/style_register.css') }}" rel="stylesheet">
</head>

<body>
    <div class="class">
     <h3>Register</h3>
     <form action="{{route('actionRegister')}}" method="post">
        @if(session('message'))
            <div class="success-message">
                {{session('message')}}
            </div>
        @endif
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
            <p class="error-message">{{ $error }}</p>
            @endforeach
        @endif
        @csrf
            <div class="txt_field">
                <input type="email" name="email" required>
                <span></span>
                <label for="">Email</label>
            </div>
            <div class="txt_field">
                <input type="text" name="name" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="text" name="first_name" required>
                <span></span>
                <label>First Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="last_name" required>
                <span></span>
                <label>Last Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="phone_number" required>
                <span></span>
                <label>Phone Number</label>
            </div>
            {{-- <div class="txt_field">
                <input type="text" name="last_name">
                <span></span>
                <label>Last Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="phone_number">
                <span></span>
                <label>Phone Number</label>
            </div> --}}
                <div class="txt_field">
                    <input type="password" name="password" required>
                    <span></span>
                    <label>Password</label>
                </div>
                   <div class="txt_field">
                       <input type="password" name="password_verify" required>
                       <span></span>
                       <label>Confirm Password</label>
                   </div>
                   <input type="submit" value="Register">
                   <div class="signup_link">
                       a member? <a href="{{url('/login')}}">Login</a>
                   </div>
        </form>
    </div>
</body>

</html>