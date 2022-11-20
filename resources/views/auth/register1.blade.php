<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }} - Register</title>
    
    {{-- fontawsome --}}
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous">
    </script>
    
    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
</head>
<body>
    <div class="container">
        {{-- forms container --}}
        <div class="forms-container">
            <div class="signin-signup">
                
                {{-- signin page --}}
                <form action="{{ route('login') }}" method="POST" class="sign-in-form">
                    @csrf
                    <h2 class="title">Sign in</h2>
                    
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Username" required="">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password" required="">
                    </div>

                    <input type="submit" value="Login" class="btn solid">

                    <p class="social-text">Or Sign in with social platforms</p>

                    <div class="social-media">
                        <a href="" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>

                </form>
                {{-- end --}}

                {{-- signup page --}}
                <form action="{{ route('register') }}" method="POST" class="sign-up-form">
                    @csrf
                    <h2 class="title">Sign Up</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="name" name="name" placeholder="Name" required="">
                    </div>
                    
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Username" required="">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email"  placeholder="Email" required="">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="text" id="location" name="location" placeholder="Location">
                    </div>

                    {{-- <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <select class="form-select" name="location" id="location">
                            <option selected="">Location</option>
                            <option value="Ketapang">Ketapang</option>
                            <option value="Manhattan">Manhattan</option>
                        </select>
                    </div> --}}

                    <input type="submit" value="Sign up" class="btn solid">

                    <p class="social-text">Or Sign up with social platforms</p>

                    <div class="social-media">
                        <a href="" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>

                </form>
                {{-- end --}}

            </div>
        </div>
        {{-- end --}}


        {{-- panels-container --}}
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New Here ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>

                {{-- image --}}
                <img src="{{ asset('frontend/assets/image/login1.svg') }}" class="image">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Please your Login ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>

                {{-- image --}}
                <img src="{{ asset('frontend/assets/image/register.svg') }}" class="image" alt="">
            </div>
        </div>

        {{-- end --}}
    </div>

    {{-- script --}}
    <script src="{{ asset('frontend/assets/js/app.js') }}"></script>
</body>
</html>