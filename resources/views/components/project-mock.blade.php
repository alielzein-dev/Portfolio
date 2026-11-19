@props(['type' => 'site'])

{{-- A drawn stand-in for a project screenshot --}}
@switch($type)
    @case('dashboard')
        <div {{ $attributes->merge(['class' => 'mock m-dash', 'aria-hidden' => 'true']) }}>
            <div>
                @foreach ([45, 70, 55, 90, 65] as $h)
                    <b style="--h: {{ $h }}%"></b>
                @endforeach
            </div>
        </div>
        @break

    @case('store')
        <div {{ $attributes->merge(['class' => 'mock m-store', 'aria-hidden' => 'true']) }}><div><b></b><b></b><b></b></div></div>
        @break

    @default
        <div {{ $attributes->merge(['class' => 'mock m-site', 'aria-hidden' => 'true']) }}><i></i><i></i><i></i><i></i></div>
@endswitch
