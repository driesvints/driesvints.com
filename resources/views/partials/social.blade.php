<ul class="text-2xl">
    @auth
        <li class="inline-block mr-6 sm:mr-10">
            <a href="{{ url('/nova/resources/posts') }}">
                <i class="enlarge fas fa-user-shield"></i>
            </a>
        </li>
    @endauth

    <li class="inline-block mr-6 sm:mr-10">
        <a href="{{ route('blog') }}">
            <i class="enlarge fas fa-rss"></i>
        </a>
    </li>
    <li class="inline-block mr-6 sm:mr-10">
        <a href="https://twitter.com/driesvints" target="_blank" rel="noopener">
            <i class="enlarge fab fa-twitter"></i>
        </a>
    </li>
    <li class="inline-block mr-6 sm:mr-10">
        <a href="https://github.com/driesvints" target="_blank" rel="noopener">
            <i class="enlarge fab fa-github"></i>
        </a>
    </li>
    <li class="inline-block mr-6 sm:mr-10">
        <a href="https://www.youtube.com/driesvints" target="_blank" rel="noopener">
            <i class="enlarge fab fa-youtube"></i>
        </a>
    </li>
    <li class="inline-block">
        <a href="https://www.linkedin.com/in/driesvints" target="_blank" rel="noopener">
            <i class="enlarge fab fa-linkedin-in"></i>
        </a>
    </li>
</ul>
