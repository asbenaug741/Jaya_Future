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

    <!-- CKeditor -->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.2.0/ckeditor5.css" />



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
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>




    {{-- Navbar --}}
    @include('partials.nav-dashboard')

    {{-- Hero --}}

    {{-- Konten kosong --}}
    <div class="main-content">

        @yield('container')

    </div>

    {{-- Footer --}}
    {{-- @include('components.footer') --}}


    <script src="https://cdn.ckeditor.com/ckeditor5/45.2.0/ckeditor5.umd.js"></script>
    <script>
        const ClassicEditor =
            .create(document.querySelector('#editor'), {
                licenseKey: '<YOUR_LICENSE_KEY>',
                plugins: [Essentials, Bold, Italic, Font, Paragraph, FormatPainter],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    'formatPainter'
                ]
            })
            .then( /* ... */ )
            .catch( /* ... */ );
    </script>
    @stack('scripts')
</body>

</html>