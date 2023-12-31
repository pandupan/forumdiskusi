<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: linear-gradient(to right, #a7d8ff, #ffffff);
                color: #094067;
                font-family: "Gill Sans", sans-serif;;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                flex-direction: column;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .hmif-image {
                width: 100px;
                height: 90px;
                margin-top: -100px;
                margin-bottom: 50%;
            }

            .auth-buttons {
            margin-top: 20px;
        }

        .auth-buttons a {
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #3da9fc;
            color: #fffffe;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .content {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 10px;
                text-align: center;
                width: 70%; 
                margin-left: auto;
                margin-right: auto;
            }

        .diskusi {
            background-color: #3490dc;
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
            margin-top: 20px;
            padding: 1.5rem 2rem 1.5rem 2rem;
            border-radius: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .diskusi:hover {
            background-color: #2779bd;
        }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            <nav>
                @if (Route::has('login') && Auth::check())
                    <div class="top-right links">
                        <a href="{{ url('/timeline') }}">Dashboard</a>
                    </div>
                @elseif (Route::has('login') && !Auth::check())
                    <div class="top-right links">
                        <div class="auth-buttons">
                            <a href="{{ url('/login') }}">Login</a>
                            <a href="{{ url('/register') }}">Register</a>
                        </div>
                    </div>
                @endif
            </nav>

            
            <div>
                <img src="{{ asset('logohmif.jpg') }}" alt="HMIF Logo" class="hmif-image">
            </div>

            <div class="content">
                    <div class="title m-b-md">
                        Forum Diskusi Informatika
                    </div>

                <div class="links">
                    <p class="">Temukan wawasan baru dan jalin hubungan dengan sesama Mahasiswa Informatika di sini. Ciptakan koneksi yang bermakna dengan para ahli bersama. Temukan solusi, jawaban, dan inspirasi dari rekan-rekan komunitas yang berpengalaman.</p>
                </div>
                <div class="diskusi">
                    <a href="/timeline" style="text-decoration: none; color: white;">
                        Mulai Diskusi
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
