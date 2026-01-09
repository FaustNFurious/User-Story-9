<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Story</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/Style.css">


    <!--- Vite CSS and JS -->    
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>


<body class="d-flex flex-column min-vh-100">

    <x-Navbar></x-Navbar>

    <main class="flex-grow-1">
        {{ $slot }}
    </main>

    <x-Footer></x-Footer>

</body>

</html>