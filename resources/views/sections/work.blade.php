<section class="block" id="work">
    <div class="wrap">
        <div class="section-head" data-reveal>
            <h2>Selected work<span class="dot">.</span></h2>
            <p>{{ $p['work']['intro'] }}</p>
        </div>

        <div class="projects">
            @foreach ($p['work']['projects'] as $project)
                @if (! empty($project['gallery']))
                    @php($first = $project['gallery'][0])
                    <article class="project featured" data-reveal data-gallery>
                        <div class="shot">
                            <img src="{{ asset($first['src']) }}" alt="{{ $project['title'] }}: {{ $first['caption'] }}" data-main>
                        </div>

                        @if (count($project['gallery']) > 1)
                            <div class="thumbs">
                                @foreach ($project['gallery'] as $shot)
                                    <button type="button" class="thumb" aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                                        data-src="{{ asset($shot['src']) }}" data-alt="{{ $project['title'] }}: {{ $shot['caption'] }}">
                                        <img src="{{ asset($shot['thumb'] ?? $shot['src']) }}" alt="" loading="lazy">
                                        <span>{{ $shot['caption'] }}</span>
                                    </button>
                                @endforeach
                            </div>
                        @endif

                        <div class="featured-text">
                            <div>
                                <small>{{ $project['type'] }}</small>
                                <h3>{{ $project['title'] }}</h3>
                                <p>{{ $project['text'] }}</p>
                                @if (! empty($project['tools']))
                                    <ul class="uses">
                                        @foreach ($project['tools'] as $tool)
                                            <li>{{ $tool }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if (! empty($project['url']))
                                    <a class="visit" href="{{ $project['url'] }}" target="_blank" rel="noopener">Visit the site</a>
                                @endif
                            </div>
                            @if (! empty($project['highlights']))
                                <ul class="highlights">
                                    @foreach ($project['highlights'] as $point)
                                        <li>{{ $point }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </article>
                @else
                    <article class="project" data-reveal>
                        <div class="shot">
                            @if (! empty($project['image']))
                                <img src="{{ asset($project['image']) }}" alt="Screenshot of {{ $project['title'] }}" loading="lazy">
                            @else
                                <x-project-mock :type="$project['mock'] ?? 'site'" />
                            @endif
                        </div>
                        <div>
                            <small>{{ $project['type'] }}</small>
                            <h3>{{ $project['title'] }}</h3>
                            <p>{{ $project['text'] }}</p>
                            <ul class="uses">
                                @foreach ($project['tools'] as $tool)
                                    <li>{{ $tool }}</li>
                                @endforeach
                            </ul>
                            @if (! empty($project['url']))
                                <a class="visit" href="{{ $project['url'] }}" target="_blank" rel="noopener">Visit the site</a>
                            @endif
                        </div>
                    </article>
                @endif
            @endforeach
        </div>
    </div>
</section>
