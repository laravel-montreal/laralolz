<!doctype html>
<html lang="en">
    @include('atomic.molecules.head')
    <body class="@yield('bodyClass')">
        <main>
            @yield('main')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </body>
</html>