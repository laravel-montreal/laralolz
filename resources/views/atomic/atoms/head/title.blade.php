@if (array_key_exists('pageTitle', View::getSections()))
    <title>Laralolz - @yield('pageTitle')</title>
@else
    <title>Laralolz</title>
@endif