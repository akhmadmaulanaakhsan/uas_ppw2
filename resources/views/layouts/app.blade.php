<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>@yield('title', 'Laravel Appp')</title>
</head>
<body>
    <nav class="navbar">
        <img href="#" class="navbar-logo" src="css/sanproduction.png" />
        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="#" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
            <a href="#" id="production-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <main>
        @yield('content')
    </main>
</body>
</html>
