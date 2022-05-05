<ul class="text-2xl">
    @auth
        <li class="inline-block mr-6">
            <a href="{{ url('/nova/resources/posts') }}" aria-label="Nova">
                <x-fas-user-shield class="enlarge w-6 h-6" />
            </a>
        </li>
    @endauth

    <li class="inline-block mr-6">
        <a href="https://twitter.com/driesvints" target="_blank" rel="noopener" aria-label="Twitter">
            <x-fab-twitter class="enlarge w-6 h-6" />
        </a>
    </li>
    <li class="inline-block">
        <a href="https://github.com/driesvints" target="_blank" rel="noopener" aria-label="Github">
            <x-fab-github class="enlarge w-6 h-6" />
        </a>
    </li>
</ul>
