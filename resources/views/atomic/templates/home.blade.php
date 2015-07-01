<!doctype html>
<html lang="en">
    @include('atomic.organisms.head')
    <body class="@yield('bodyClass')">
        <main>
            @yield('main')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </body>
</html>