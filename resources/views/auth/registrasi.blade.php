<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>

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
                    {{-- sign up form --}}
                    <form action="#" class="sign-up-form" autocomplete="off">
                        <div class="logo mb-2">
                            <img src="{{ url('frontend/asset-frontend-page/img/icon-sign.svg') }}" alt="logo">
                            
                        </div>

                        <div class="heading">
                            <h2 class="mb-0">Get Started!</h2>
                            <h6>Already have an account?</h6>
                            <a href="#" class="toggle">Sign in</a>
                        </div>

                        <div class="actual-form mt-3">
                            <div class="input-wrap">
                                <input type="text" class="input-field" name="name" autocomplete="off" required>
                                <label>Name</label>
                            </div>

                            <div class="input-wrap">
                                <input type="text" class="input-field" name="username" minlength="4" autocomplete="off" required>
                                <label>Akun</label>
                            </div>

                            <div class="input-wrap">
                                <input type="email" class="input-field" name="email" autocomplete="off" required>
                                <label>Email</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" class="input-field" name="password" minlength="4" autocomplete="off" required>
                                <label>Password</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password_confirmation" class="input-field" name="password_confirmation" minlength="4" autocomplete="off" required>
                                <label>Password Confirmation</label>
                            </div>

                            <input type="submit" value="Sign In" class="sign-btn">
                            <p class="text">
                                By signing up, I agree to the
                                <a href="#">Terms of Services</a>
                                and <a href="#">Privacy Policy</a>
                            </p>

                        </div>

                    </form>
                    {{-- end sign up form --}}
                </div>

                <div class="carousel">
                    <div class="images-wrapper">
                            <img src="{{ url('frontend/asset-frontend-page/img/img-1.svg') }}" class="image img-1 show" alt="">
                            <img src="{{ url('frontend/asset-frontend-page/img/img-2.svg') }}" class="image img-2" alt="">
                            <img src="{{ url('frontend/asset-frontend-page/img/img-3.svg') }}" class="image img-3" alt="">
                        
                    </div>

                    <div class="text-slider">
                        <div class="text-wrap">
                            <div class="text-group">
                                <h2>Improvement that is smart</h2>
                                <h2>Service excellent</h2>
                                <h2>The like is techonolgy</h2>
                            </div>
                        </div>

                        <div class="bullets">
                            <span class="active" data-value="1"></span>
                            <span data-value="2"></span>
                            <span data-value="3"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>








    
    {{-- js --}}
    <script src="{{ url('frontend/asset-frontend-page/js/login.js') }}"></script>
</body>
</html>