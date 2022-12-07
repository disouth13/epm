<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('frontend/asset-frontend-page/css/style.css') }}">
</head>
<body>
    <main>
        <div class="big-wrapper light">
            <img src="{{ url('frontend/asset-frontend-page/img/shape.png') }}" alt="" class="shape">

            <header>
                <div class="container">
                    <div class="logo">
                        <img src="{{ url('frontend/asset-frontend-page/img/icon-brand.svg') }}" alt="logo">
                        
                    <span>
                        <h2 style="color: #7B61FF;">PMS</h2>
                    </span>
                    </div>


                    <div class="links">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="{{ route('login') }}" class="btn">Login</a></li>
                        </ul>
                    </div>

                    <div class="overlay"></div>
                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                </div>
            </header>

            <div class="showcase-area">
                <div class="container">
                    <div class="left">
                        <div class="big-title">
                            <h1>Preventive <span style="color: #7B61FF;">Maintenance,</span></h1>
                            <h1>Service Exploring now.</h1>
                        </div>
                        <p class="text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto eum corrupti veniam, quasi possimus optio praesentium recusandae quo culpa nulla inventore ullam beatae amet dolore omnis placeat exercitationem rerum voluptatum!
                        </p>
                        <div class="cta">
                            <a href="" class="btn">Get Started</a>
                        </div>
                    </div>

                    <div class="right">
                    
                        <img src="{{ url('frontend/asset-frontend-page/img/hero-img.svg') }}" alt="Person Image" class="person">
                    </div>
                </div>
            </div>

            <div class="bottom-area">
                <div class="container">
                    <button class="toggle-btn">
                        <i class="far fa-moon"></i>
                        <i class="far fa-sun"></i>
                    </button>
                </div>
            </div>
        </div>
    </main>

    {{-- js --}}
    <script src="{{ url('https://kit.fontawesome.com/a81368914c.js') }}"></script>
    <script src="{{ asset('frontend/asset-frontend-page/js/app.js') }}"></script>
</body>
</html>