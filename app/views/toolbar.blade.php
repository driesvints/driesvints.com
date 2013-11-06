<div class="navbar navbar-static-top navbar-inverse">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="{{ route('home') }}">Dries Vints</a>

        <div class="nav-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li><a href="{{ route('admin.pages.index') }}">Pages</a></li>
            </ul>

            <ul class="nav navbar-nav pull-right">
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
            <p class="navbar-text pull-right">Signed in as <strong>{{ link_to_route('admin.users.edit', Auth::user()->fullname(), Auth::user()->id) }}</strong></p>
        </div>
    </div>
</div>