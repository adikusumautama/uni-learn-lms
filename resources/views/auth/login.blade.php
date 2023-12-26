<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      darkMode: "class",
    }
    </script>
    <style>
        /* style form */
        * {
            font-family: 'Poppins' !important;
        }

        /* body {
            background-repeat:no-repeat;
        } */
        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            /* background: rgba(24, 20, 20, 0.987); */
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 10px;
            /* backdrop-filter: blur(6px) saturate(180%) grayscale(3%); */
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus~label,
        .login-box .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #bdb8b8;
            font-size: 12px;
        }

        .login-box form button {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #ffffff;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 4px;
            border: none;
        }

        .login-box .log-in:hover {
            background: #03f40f !important;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #03f40f,
                0 0 25px #03f40f,
                0 0 50px #03f40f,
                0 0 100px #03f40f;
        }

        .login-box .daftar:hover {
            background: red !important;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px red,
                0 0 25px red,
                0 0 50px red,
                0 0 100px red;
        }

        .login-box button span {
            position: absolute;
            display: block;
        }

        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }

            50%,
            100% {
                left: 100%;
            }
        }

        .login-box .log-in .span-login:nth-child(1) {
            bottom: 2px;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #03f40f);
            animation: btn-anim1 2s linear infinite;
        }

        .login-box .daftar .span-daftar:nth-child(1) {
            bottom: 2px;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, red);
            animation: btn-anim1 2s linear infinite;
        }

        /* end style form */

        /* Style Bg Theme */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');

        body {
            font-family: Inter, sans-serif;
        }

        @keyframes jumbo {
            from {
                background-position: 50% 50%, 50% 50%;
            }

            to {
                background-position: 350% 50%, 350% 50%;
            }
        }

        .jumbo {
            --stripes: repeating-linear-gradient(100deg,
                    #fff 0%,
                    #fff 7%,
                    transparent 10%,
                    transparent 12%,
                    #fff 16%);
            --stripesDark: repeating-linear-gradient(100deg,
                    #000 0%,
                    #000 7%,
                    transparent 10%,
                    transparent 12%,
                    #000 16%);
            --rainbow: repeating-linear-gradient(100deg,
                    #60a5fa 10%,
                    #e879f9 15%,
                    #60a5fa 20%,
                    #5eead4 25%,
                    #60a5fa 30%);
            background-image: var(--stripes), var(--rainbow);
            background-size: 300%, 200%;
            background-position: 50% 50%, 50% 50%;

            filter: blur(10px) invert(100%);

            mask-image: radial-gradient(ellipse at 100% 0%, black 40%, transparent 70%);

            pointer-events: none;
        }

        .jumbo::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image: var(--stripes), var(--rainbow);
            background-size: 200%, 100%;
            animation: jumbo 60s linear infinite;
            background-attachment: fixed;
            mix-blend-mode: difference;
        }

        .dark .jumbo {
            background-image: var(--stripesDark), var(--rainbow);
            filter: blur(10px) opacity(50%) saturate(200%);
        }

        .dark .jumbo::after {
            background-image: var(--stripesDark), var(--rainbow);
        }

        /* End Style Bg Theme */
    </style>
</head>

<body>

<div class="relative flex flex-col h-[100vh] items-center bg-white dark:bg-black transition-bg">
    <div class="absolute inset-0 overflow-hidden">
        <div class="jumbo absolute -inset-[10px] opacity-50"></div>
    </div>
    
   
</div>
    <div class="login-box">
        <center>
        <h1 class="relative flex content-center text-5xl font-bold text-gray-800 dark:text-white dark:opacity-80 transition-colors mb-6 ml-16">
            UNI
            <span class="ml-1 rounded-xl bg-current p-2 text-[0.7em] leading-none">
                <span class="text-white dark:text-black">Learn</span>
            </span>
        </h1>
        </center>
        <center>
        <button onclick="toggleTheme()"
            class="px-3 py-1 border border-stone-200 rounded-full drop-shadow-sm text-sm text-stone-800 dark:text-white bg-white/40 dark:bg-black/40 backdrop-blur-lg hover:border-stone-300 transition-colors dark:border-stone-500 dark:hover:border-stone-400">
            CHANGE COLOR</button>
        </center>
    <div class="log-in">
    </div>
        <h1 style="color: #427D9D;margin-bottom:15px;">Login</h1>

        <form id="loginForm" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="user-box">
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" style="color: #427D9D;">
                @if ($errors->has('email'))
                <label for="email">{{ $errors->first('email') }}</label>
                @endif
            </div>
            <div class="user-box">
                <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" style="color: #427D9D;">
                @if ($errors->has('password'))
                <label class="error" for="password">{{ $errors->first('password') }}</label>
                @endif
            </div>
            <center>
                <div type="submit" class="container" style="gap: 0.5rem !important;">
                    <button type="submit" class="log-in"
                        style="background-color: rgba(24, 20, 20, 0.987); border-radius:6px; margin-right:20px;">
                        Login
                        <span class="span-login"></span>
                    </button>
                    <button type="button" class="daftar"
                        style="background-color: rgba(24, 20, 20, 0.987); border-radius:6px;"
                        onclick="window.location.href='{{ route('register') }}'">
                        Register
                        <span class="span-daftar"></span>
                    </button>
                </div>
            </center>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: 'The email field is required.',
                        email: 'The email must be a valid email address.'
                    },
                    password: {
                        required: 'The password field is required.'
                    }
                }
            });
        });

        
        function toggleTheme() {
            if (document.body.classList.contains("dark"))
                document.body.classList.remove("dark");
            else
                document.body.classList.add("dark");
        }
    </script>
    



</body>

</html>