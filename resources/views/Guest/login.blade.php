<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login/Signup Form</title>

    @vite('resources/css/login.css')
    @vite('resources/js/login.js')
</head>

<body>

    <!-- credits to the writter @leonam-silva-de-souza -->
    <div class="container {{$errors->hasBag('register') ? 'active' : '' }}">
        <div class="form-box login">
            <form action="{{route('login.post')}}" method="post">
                @csrf
                <h1>Login</h1>
                <div class="input-box">
                    <input type="email" name="email" id="email" placeholder="email">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <!-- <div class="forgot-link">
                      <a href="#">Forgot Password?</a>
                  </div> -->
                <button type="submit" class="btn">Login</button>
                @if($errors->login->any())
                @foreach($errors->login->all() as $error)
                <div>{{$error}}</div>
                @endforeach
                @endif
                @if(session()->has('error'))
                <div>{{session('error')}}</div>
                @endif
                @if(session()->has('success'))
                <div>{{session('success')}}</div>
                @endif

            </form>
        </div>

        <div class="form-box register">
            <form action="{{route('registration.post')}}" method="post">
                @csrf
                <h1>Registration</h1>
                <div class="input-box">
                    <input type="text" name="name" id="name" placeholder="Username">
                    <i class='fa-duotone fa-solid fa-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <i class='fa-solid fa-lock'></i>
                </div>
                <button type="submit" class="btn">Register</button>
                @if($errors->register->any())
                @foreach($errors->register->all() as $error)
                <div>{{$error}}</div>
                @endforeach
                @endif
                @if(session()->has('error'))
                <div>{{session('error')}}</div>
                @endif
                @if(session()->has('success'))
                <div>{{session('success')}}</div>
                @endif

            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">Register</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>
</body>

</html>