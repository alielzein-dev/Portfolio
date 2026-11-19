<section class="block tint" id="about">
    <div class="wrap about-grid">
        <div data-reveal>
            <h2>About me<span class="dot">.</span></h2>
            <p class="lede">{{ $p['about']['text'] }}</p>
        </div>
        <div data-reveal style="--d: .12s">
            <dl class="stats">
                @foreach ($p['about']['stats'] as $stat)
                    <div>
                        <dt data-count="{{ $stat['value'] }}">{{ $stat['value'] }}+</dt>
                        <dd>{{ $stat['label'] }}</dd>
                    </div>
                @endforeach
            </dl>
            <ul class="stack" aria-label="Tools I work with">
                @foreach ($p['about']['tools'] as $tool)
                    <li>{{ $tool }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
