<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }} - Register</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon/icon-logo.png') }}">


    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="{{ url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- boostrap 5 --}}
    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi Akun</h1>
                            </div>
                            <form class="user">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Name" aria-label="default input example">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="text" id="usernamme" name="username" placeholder="username" aria-label="default input example">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control"
                                            id="passwod" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password_confirmation" class="form-control"
                                            id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">
                                </div>
                                <div class="form-group">
                                    
                                    <select class="form-select" name="location" id="location">
                                        <option selected>Pilih Location</option>
                                        <option value="Ketapang">Ketapang</option>
                                        <option value="Manhattan">Manhattan</option>
                                    </select>
                                    
                                </div>
                                <a href="login.html" class="btn btn-primary btn-block">
                                    Register Account
                                </a>
                            
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend/assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('backend/assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('backend/assets/admin/js/sb-admin-2.min.js') }}"></script>

    {{-- script boostrap 5 --}}
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>