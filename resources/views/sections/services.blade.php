<section class="block" id="services">
    <div class="wrap">
        <div class="section-head" data-reveal>
            <h2>Services<span class="dot">.</span></h2>
            <p>{{ $p['services']['intro'] }}</p>
        </div>
        <ul class="services">
            @foreach ($p['services']['items'] as $service)
                <li class="service" data-reveal style="--d: {{ $loop->index * 0.08 }}s">
                    <h3>{{ $service['title'] }}</h3>
                    <p>{{ $service['text'] }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>
