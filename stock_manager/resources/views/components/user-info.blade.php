<ul>
    <li>
        <form action="{{ route('logout')}} " method="post">
            @csrf
            <button>Logout</button>
        </form>
    </li>

    <li>{{ Auth::user()->name }}
        {{--
        <a href="{{ route('team.show') }}">
        {{ Auth::user()->name }}
        </a>
        --}}
    </li>
</ul>
<hr>
