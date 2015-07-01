<!doctype html>
<html lang="en">
    @include('atomic.organisms.head')
    <body class="@yield('bodyClass')">
        <main>
            @yield('main')
        </main>
        <footer>
            @include('atomic.organisms.footer')
        </footer>
    </body>
</html>