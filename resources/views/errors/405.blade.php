<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>405</title>

    {{-- font poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- icon bootstrap --}}
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css') }}">


    {{-- css error 405 --}}
    <link rel="stylesheet" href="{{ url('frontend/assets-error/css/style-error.css') }}">
</head>
<body>
    <section class="page-405">
        {{-- image --}}
        <img src="{{ url('frontend/assets-error/img/405.svg') }}">

        <h2>Tidak ada akses!</h2>
        <p>silahkan register melalui administrator. <a href="{{ route('login') }}">Masuk</a></p>


    </section>
</body>
</html>