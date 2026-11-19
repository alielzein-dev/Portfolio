@props(['project'])

{{-- Type, title, description, tools and link: shared by every project layout --}}
<div {{ $attributes }}>
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
