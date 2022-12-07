<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    {{-- css bootsrap --}}
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- auth-style --}}
    <link rel="stylesheet" href="{{ url('frontend/asset-frontend-page/css/auth-style.css') }}">

    {{-- font poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

    <main class="d-flex justify-content-center align-items-center">
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="#" class="sign-in-form" autocomplete="off">
                        <div class="logo">
                            <img src="{{ url('frontend/asset-frontend-page/img/icon-sign.svg') }}" alt="logo">
                            
                        </div>

                        <div class="heading">
                            <h2>Welcome Back!</h2>
                            <h6>Not Registered yet?</h6>
                            <a href="#" class="toggle">Sign Up</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" class="input-field" name="username" minlength="4" autocomplete="off" required>
                                <label>Username</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" class="input-field" name="password" minlength="4" autocomplete="off" required>
                                <label>Password</label>
                            </div>

                            <input type="submit" value="Sign In" class="sign-btn">
                            <p class="text">
                                Forgot password or your login?
                                <a href="#">Get Help</a> signin in
                            </p>

                        </div>

                    </form>
                </div>

                <div class="carousel"></div>
            </div>
        </div>
    </main>








    
    {{-- js --}}
    <script src="{{ url('frontend/asset-frontend-page/js/login.js') }}"></script>
</body>
</html>