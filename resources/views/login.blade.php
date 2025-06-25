<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/ken-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/yap-style.css') }}">

    <!-- Bootstraps Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- {{-- font --}} -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <title>Jaya Future</title>
</head>

<body>

    @include('partials.nav-signup')

    <div class="sign-in container">
        <h2 class="fw-bold mb-5` mt-5">Log in to your account to keep exploring jobs, internships, and training programs just for you.</h2>

        <form class="w-50" method="POST" action="">
            @csrf
            <div class="my-4">
                <div>
                    <label class="email" id="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Write Your Email" value="{{ old('email') }}" autocomplete="email">

                    <span class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="my-4">
                <div>
                    <label class="password" id="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Your password" autocomplete="current-password">

                    <span class="text-danger">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>
            <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
            <div class="mt-3">
                <p>Don't have an account? <a href="{{ route('register') }}">Create one now</a></p>
        </form>
    </div>



</body>

</html>