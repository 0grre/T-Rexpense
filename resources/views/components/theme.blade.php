<div class="flex-1">
    <label for="my-drawer-3" class="btn btn-square btn-ghost">
        @if(Session::get('theme'))
            @foreach (Config::get('themes') as $theme => $mod)
                @if ($theme != Session::get('theme'))
                    <a href="{{ route('theme.switch', $theme) }}" class="mx-2 mt-0.5">
                        <span class="material-symbols-outlined">
                            {{$mod}}
                        </span>
                    </a>
                @endif
            @endforeach
        @else
            <a href="{{ route('theme.switch', 'corporate') }}" class="mx-2 mt-0.5">
                <span class="material-symbols-outlined">
                    light_mode
                </span>
            </a>
        @endif
    </label>
        <label for="my-drawer-3" class="btn btn-square btn-ghost">
            <a href="/" class="mx-2 mt-0.5">
                <span class="material-symbols-outlined">
                    home
                </span>
            </a>
        </label>
</div>
