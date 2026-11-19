@php($fullName = $p['name']['first'].' '.$p['name']['last'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $fullName }} | {{ $p['role'] }}</title>
        <meta name="description" content="{{ $p['description'] }}">
        <meta name="theme-color" content="#000000">
        <meta property="og:title" content="{{ $fullName }} | {{ $p['role'] }}">
        <meta property="og:description" content="{{ $p['description'] }}">
        <meta property="og:type" content="website">
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

        {{-- Lets the CSS hide scroll-reveal content only when JavaScript is running --}}
        <script>document.documentElement.classList.add('js');</script>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="progress" id="progress" aria-hidden="true"></div>

        <header class="nav" id="nav">
            <div class="wrap">
                <a class="brand" href="#top">{{ $fullName }}<b>.</b></a>
                <div class="nav-right">
                    <nav aria-label="Primary">
                        <ul class="nav-links">
                            <li><a href="#services">Services</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#work">Work</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </nav>
                    <a class="btn btn-green" href="#contact">Get in touch</a>
                </div>
            </div>
        </header>

        <main id="top">
            @yield('content')
        </main>

        <footer>
            <div class="wrap">
                <span>&copy; {{ date('Y') }} {{ $fullName }}</span>
                <a class="to-top" href="#top">Back to top
                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 13V3M3.5 7.5L8 3l4.5 4.5"/></svg>
                </a>
            </div>
        </footer>
    </body>
</html>
