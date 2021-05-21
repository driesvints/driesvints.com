<ul class="text-2xl">
    @auth
        <li class="inline-block mr-6 sm:mr-10">
            <a href="{{ url('/nova/resources/posts') }}" aria-label="Nova">
                <i class="enlarge fas fa-user-shield"></i>
            </a>
        </li>
    @endauth

    <li class="inline-block mr-6 sm:mr-10">
        <a href="{{ route('blog') }}" aria-label="RSS Feed">
            <i class="enlarge fas fa-glasses"></i>
        </a>
    </li>
    <li class="inline-block mr-6 sm:mr-10">
        <a href="https://twitter.com/driesvints" target="_blank" rel="noopener" aria-label="Twitter">
            <i class="enlarge fab fa-twitter"></i>
        </a>
    </li>
    <li class="inline-block mr-6 sm:mr-10">
        <a href="https://github.com/driesvints" target="_blank" rel="noopener" aria-label="Github">
            <i class="enlarge fab fa-github"></i>
        </a>
    </li>
    <li class="inline-block mr-6 sm:mr-10">
        <a href="https://www.youtube.com/driesvints" target="_blank" rel="noopener" aria-label="Youtube">
            <i class="enlarge fab fa-youtube"></i>
        </a>
    </li>
</ul>
