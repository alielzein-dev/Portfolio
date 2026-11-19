<section class="hero" id="hero">
    <div class="wrap hero-grid">
        <div>
            <h1>
                <span><span>{{ $p['name']['first'] }}</span></span>
                <span><span>{{ $p['name']['last'] }}</span></span>
            </h1>
            <p class="intro">{{ $p['role'] }}</p>
            <div class="hero-actions">
                <a class="btn btn-green" href="#work">See my work</a>
                <a class="btn btn-line" href="#contact">Contact me</a>
            </div>
            <ul class="socials">
                @foreach ($p['socials'] as $label => $url)
                    <li><a href="{{ $url }}" target="_blank" rel="noopener">{{ $label }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="portrait" id="portrait">
            <div class="ring-wrap"><div class="ring"></div></div>
            @if ($p['photo'])
                <img class="person" src="{{ asset($p['photo']) }}" alt="{{ $p['name']['first'] }} {{ $p['name']['last'] }}">
            @else
                <svg class="person" viewBox="0 0 420 470" aria-hidden="true">
                    <defs>
                        <linearGradient id="pg" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0" stop-color="#5a5a5a"/><stop offset="1" stop-color="#1e1e1e"/>
                        </linearGradient>
                    </defs>
                    <circle cx="210" cy="150" r="80" fill="url(#pg)"/>
                    <path d="M40 470c0-112 76-190 170-190s170 78 170 190z" fill="url(#pg)"/>
                </svg>
                <span class="photo-note">Your photo goes here</span>
            @endif
        </div>
    </div>
</section>
