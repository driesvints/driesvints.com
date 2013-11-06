@if (count($posts))
    @foreach ($posts as $post)
        @include('posts.excerpt')
    @endforeach
@endif