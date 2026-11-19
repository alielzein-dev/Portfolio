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
                            <x-project-info :project="$project" />
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
                        <x-project-info :project="$project" />
                    </article>
                @endif
            @endforeach
        </div>
    </div>
</section>
