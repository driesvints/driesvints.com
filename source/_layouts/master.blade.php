<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Site info -->
    <title>{{ isset($title) ? "$title | " : '' }}Dries Vints</title>

    @isset($metaDescription)
        <meta name="description" content="{{ $metaDescription }}">
    @endisset

    @if ($page->date)
        <meta property="article:published_time" content="{{ date('Y-m-d', $page->date) }}" />
    @endif

    <!-- Stylsheets -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,600,600i,700,700i;Ubuntu+Mono" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

    @include('_partials.google-analytics')
</head>
<body class="bg-grey-lightest font-sans text-lg text-grey-darker leading-normal antialiased border-t-8 border-theme-blue h-full">
    @include('_partials.fbvideo')

    <div class="text-xl max-w-lg m-auto px-4 py-8 md:py-12">
        @yield('body')
    </div>

    <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
</body>
</html>
