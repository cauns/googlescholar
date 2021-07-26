<li class="nav-item">
    <a href="{{ route('authors.index') }}"
       class="nav-link {{ Request::is('authors*') ? 'active' : '' }}">
        <p>Authors</p>
    </a>
</li>


{{--<li class="nav-item">--}}
    {{--<a href="{{ route('articles.index') }}"--}}
       {{--class="nav-link {{ Request::is('articles*') ? 'active' : '' }}">--}}
        {{--<p>Articles</p>--}}
    {{--</a>--}}
{{--</li>--}}


{{--<li class="nav-item">--}}
    {{--<a href="{{ route('cites.index') }}"--}}
       {{--class="nav-link {{ Request::is('cites*') ? 'active' : '' }}">--}}
        {{--<p>Cites</p>--}}
    {{--</a>--}}
{{--</li>--}}


{{--<li class="nav-item">--}}
    {{--<a href="{{ route('authorCiteArticles.index') }}"--}}
       {{--class="nav-link {{ Request::is('authorCiteArticles*') ? 'active' : '' }}">--}}
        {{--<p>Author Cite Articles</p>--}}
    {{--</a>--}}
{{--</li>--}}


