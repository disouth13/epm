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
      crossorigin="anonymous"
    ></script>
    
    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                {{-- sign in --}}
            <form action="" class="sign-in-form">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="" id="" placeholder="Password">
                </div>

                <input type="submit" value="Login" class="btn solid">

                <p class="sosial-text">Or Sign in with sosial platforms</p>
                <div class="social-media">
                    <a href="#" class="sosial-icon">
                        <i class="fab fa-facebook"></i>
                    </a>

                    <a href="#" class="sosial-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    
                    <a href="#" class="sosial-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="sosial-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
            {{-- end sign in --}}

            {{-- sign up --}}
            <form action="" class="sign-up-form">
                <h2 class="title">Sign Up</h2>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Name">
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>

                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="email">
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="" id="" placeholder="Password">
                </div>

                <input type="submit" value="Sign Up" class="btn solid">

                <p class="sosial-text">Or Sign up with sosial platforms</p>
                <div class="social-media">
                    <a href="#" class="sosial-icon">
                        <i class="fab fa-facebook"></i>
                    </a>

                    <a href="#" class="sosial-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    
                    <a href="#" class="sosial-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="sosial-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
            {{-- end --}}
            </div>
        </div>

        <div class="panels-container">

        </div>
    </div>
</body>
</html>