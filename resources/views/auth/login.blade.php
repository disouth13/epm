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

    {{-- icon bootstrap --}}
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css') }}">

</head>
<body>

    <main class="d-flex justify-content-center align-items-center">
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    {{-- sign in form --}}
                    <form action="{{ route('login') }}"  method="POST" class="sign-in-form" autocomplete="off">
                        @csrf
                        <div class="logo">
                            <img src="{{ url('frontend/asset-frontend-page/img/icon-sign.svg') }}" alt="logo">
                            
                        </div>

                        <div class="heading">
                            <h2>Selamat datang!</h2>
                            <h6>Silahkan registrasi akun anda!</h6>
                            <a href="#" class="toggle">Buat akun</a>
                            {{-- <a href="#" class="toggle">Administrator!</a> --}}
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" class="input-field" name="username" minlength="4" autocomplete="off" required>
                                <label>Akun</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" class="input-field" name="password" minlength="4" autocomplete="off" required>
                                <label>Kata sandi</label>
                            </div>

                            <input type="submit" value="Masuk" class="sign-btn">
                            <p class="text">
                                Lupa password? silahkan
                                <a href="#">Ubah password</a> anda!
                            </p>

                        </div>

                    </form>
                    {{-- end sign in form --}}
                    <form action="#" class="sign-up-form">
                        <div class="alert alert-primary" role="alert">
                            
                            <h6 class="alert-heading"><i class="bi bi-exclamation-triangle-fill"></i><strong> Informasi kendala login!</strong></h6>
                            <p>
                                Silahkan konfirmasi terkait akun login anda ke PIC terakit!
                                Terima kasih..
                            </p>
                            <hr>
                            <p class="mb-0">
                                <a href="#" class="btn btn-block btn-primary toggle" style="color: #fff;">Masuk</a>
                            </p>
                          </div>
                    </form>
                    
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
                                <h2>Silahkan melakukan login!</h2>
                                <h2>Silahkan registrasi akun!</h2>
                                <h2>Hubungi administrator!</h2>
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