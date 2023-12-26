<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
    }
  </script>
  <style>
         * {
            font-family: 'Poppins' !important;
        }
.form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-width: 350px;
  padding: 20px;
  border-radius: 20px;
  position: relative;
  /* background-color: #1a1a1a; */
  color: #fff;
  border: 1px solid #333;
  backdrop-filter: blur(6px) saturate(180%) grayscale(3%);
}

.title {
  font-size: 28px;
  font-weight: 600;
  letter-spacing: -1px;
  position: relative;
  display: flex;
  align-items: center;
  padding-left: 30px;
  color: #9BBEC8;
}

.title::before {
  width: 18px;
  height: 18px;
}

.title::after {
  width: 18px;
  height: 18px;
  animation: pulse 1s linear infinite;
}

.title::before,
.title::after {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  border-radius: 50%;
  left: 0px;
  background-color: #9BBEC8;
}

.message, 
.signin {
  font-size: 14.5px;
  color: rgba(255, 255, 255, 0.7);
}

.signin {
  text-align: center;
}

.signin a:hover {
  text-decoration: underline royalblue;
}

.signin a {
  color: #00bfff;
}

.flex {
  display: flex;
  width: 100%;
  gap: 6px;
}

.form label {
  position: relative;
}

.form label .input {
  background-color: #333;
  color: #fff;
  width: 100%;
  padding: 20px 05px 05px 10px;
  outline: 0;
  border: 1px solid rgba(105, 105, 105, 0.397);
  border-radius: 10px;
}

.form label .input + span {
  color: rgba(255, 255, 255, 0.5);
  position: absolute;
  left: 10px;
  top: 0px;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}

.form label .input:placeholder-shown + span {
  top: 12.5px;
  font-size: 0.9em;
}

.form label .input:focus + span,
.form label .input:valid + span {
  color: #00bfff;
  top: 0px;
  font-size: 0.7em;
  font-weight: 600;
}

.input {
  font-size: medium;
}

.submit {
  border: none;
  outline: none;
  padding: 10px;
  border-radius: 10px;
  color: #fff;
  font-size: 16px;
  transform: .3s ease;
  background-color: #00bfff;
}

.submit:hover {
  background-color: #00bfff96;
}

@keyframes pulse {
  from {
    transform: scale(0.9);
    opacity: 1;
  }

  to {
    transform: scale(1.8);
    opacity: 0;
  }
}

/* button */
.ui-btn {
  --btn-default-bg: rgb(41, 41, 41);
  --btn-padding: 15px 20px;
  --btn-hover-bg: rgb(51, 51, 51);
  --btn-transition: .3s;
  --btn-letter-spacing: .1rem;
  --btn-animation-duration: 1.2s;
  --btn-shadow-color: rgba(0, 0, 0, 0.137);
  --btn-shadow: 0 2px 10px 0 var(--btn-shadow-color);
  --hover-btn-color: #FAC921;
  --default-btn-color: #9BBEC8;
  --font-size: 16px;
  /* 👆 this field should not be empty */
  --font-weight: 600;
  --font-family: Menlo,Roboto Mono,monospace;
  /* 👆 this field should not be empty */
}

/* button settings 👆 */

.ui-btn {
  box-sizing: border-box;
  padding: var(--btn-padding);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--default-btn-color);
  font: var(--font-weight) var(--font-size) var(--font-family);
  background: var(--btn-default-bg);
  border: none;
  cursor: pointer;
  transition: var(--btn-transition);
  overflow: hidden;
  box-shadow: var(--btn-shadow);
}

.ui-btn span {
  letter-spacing: var(--btn-letter-spacing);
  transition: var(--btn-transition);
  box-sizing: border-box;
  position: relative;
  background: inherit;
}

.ui-btn span::before {
  box-sizing: border-box;
  position: absolute;
  content: "";
  background: inherit;
}

.ui-btn:hover, .ui-btn:focus {
  background: var(--btn-hover-bg);
}

.ui-btn:hover span, .ui-btn:focus span {
  color: var(--hover-btn-color);
}

.ui-btn:hover span::before, .ui-btn:focus span::before {
  animation: chitchat linear both var(--btn-animation-duration);
}

@keyframes chitchat {
  0% {
    content: "#";
  }

  5% {
    content: ".";
  }

  10% {
    content: "^{";
  }

  15% {
    content: "-!";
  }

  20% {
    content: "#$_";
  }

  25% {
    content: "№:0";
  }

  30% {
    content: "#{+.";
  }

  35% {
    content: "@}-?";
  }

  40% {
    content: "?{4@%";
  }

  45% {
    content: "=.,^!";
  }

  50% {
    content: "?2@%";
  }

  55% {
    content: "\;1}]";
  }

  60% {
    content: "?{%:%";
    right: 0;
  }

  65% {
    content: "|{f[4";
    right: 0;
  }

  70% {
    content: "{4%0%";
    right: 0;
  }

  75% {
    content: "'1_0<";
    right: 0;
  }

  80% {
    content: "{0%";
    right: 0;
  }

  85% {
    content: "]>'";
    right: 0;
  }

  90% {
    content: "4";
    right: 0;
  }

  95% {
    content: "2";
    right: 0;
  }

  100% {
    content: "";
    right: 0;
  }
}

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
    <center>
      <h1
          class="relative flex text-5xl font-bold text-gray-800 dark:text-white dark:opacity-80 transition-colors mt-28">
          UNI
          <span class="ml-1 rounded-xl bg-current p-2 text-[0.7em] leading-none">
              <span class="text-white dark:text-black">Learn</span>
          </span>
      </h1>
    </center>
    <div class="log-in">
        <button onclick="toggleTheme()"
            class="px-3 py-1 border border-stone-200 rounded-full drop-shadow-sm text-sm text-stone-800 dark:text-white bg-white/40 dark:bg-black/40 backdrop-blur-lg hover:border-stone-300 transition-colors dark:border-stone-500 dark:hover:border-stone-400">
            CHANGE COLOR</button>
    </div>
    <center>
<form class="form" method="POST" action="{{ route('register') }}" id="registerForm">
    {{ csrf_field() }}
    <p class="title" style="color: #427D9D;">Register </p>
    <p class="message" style="color: #427D9D;">Signup now and get full access to our app. </p>
        <div class="flex">
        <label>
            <input class="input" type="text" placeholder="" required="" value="@if(!empty($name)){{ $name }}@else{{ old('first_name') }}@endif" name="first_name">
            @if ($errors->has('first_name'))
            <label class="error" for="first_name">{{ $errors->first('first_name') }}</label>
            @endif
            <span>Firstname</span>
        </label>

        <label>
            <input class="input" type="text" placeholder="" required="" value="{{ old('last_name') }}" name="last_name">
            @if ($errors->has('last_name'))
            <label class="error" for="last_name">{{ $errors->first('last_name') }}</label>
            @endif
            <span>Lastname</span>
        </label>
    </div>  
            
    <label>
        <input class="input" type="email" placeholder="" required="" value="@if(!empty($name)){{ $email }}@else{{ old('email') }}@endif" name="email">
        @if ($errors->has('email'))
        <label class="error" for="email">{{ $errors->first('email') }}</label>
        @endif
        <span>Email</span>
    </label> 
        
    <label>
        <input class="input" type="password" placeholder="" required=""name="password" id="password">
        @if ($errors->has('password'))
        <label class="error" for="password">{{ $errors->first('password') }}</label>
        @endif
        <span>Password</span>
    </label>
    <label>
        <input class="input" type="password" placeholder="" required="" name="password_confirmation">
        @if ($errors->has('password_confirmation'))
        <label class="error" for="password_confirmation">{{ $errors->first('password_confirmation') }}</label>
        @endif
        <span>Confirm password</span>
    </label>
    <!-- <button class="submit" type="submit">Submit</button> -->
    <center>
    <button class="ui-btn submit" type="submit">
        <span>
            Register
        </span>
    </button>
    </center>
    <p class="signin" style="color: #427D9D;">Already have an acount ? <a href="{{ route('login') }}" style="text-decoration:none;">Signin</a> </p>
</form>
</center>
</div>

</body>
    <!-- content end -->
<script type="text/javascript">
$(document).ready(function()
{
    $("#registerForm").validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email:{
                    required: true,
                    email:true,
                    remote: "{{ url('checkUserEmailExists') }}"
                },
                password:{
                    required: true,
                    minlength: 6
                },
                password_confirmation:{
                    required: true,
                    equalTo: '#password'
                }
            },
            messages: {
                first_name: {
                    required: 'The fname field is required.'
                },
                last_name: {
                    required: 'The lname field is required.'
                },
                email: {
                    required: 'The email field is required.',
                    email: 'The email must be a valid email address.',
                    remote: 'The email has already been taken.'
                },
                password: {
                    required: 'The password field is required.',
                    minlength: 'The password must be at least 6 characters.'
                },
                password_confirmation: {
                    required: 'The password confirmation field is required.',
                    equalTo: 'The password confirmation does not match.'
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

</html>