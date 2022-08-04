@foreach (Config::get('languages') as $lang => $language)
    @if ($lang != App::getLocale())
        <li>
            <a href="{{ route('lang.switch', $lang) }}" class="mx-2 mt-0.5">{{ $language }}</a>
        </li>
    @endif
@endforeach
