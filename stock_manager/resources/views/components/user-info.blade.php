<ul class="flex items-center gap-4 text-sm">
    <a href="{{ route('users.show', Auth::user()) }}">
        <li>{{ Auth::user()->name }}</li>
    </a>
    <li>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn-secondary">Logout</button>
        </form>
    </li>
</ul>
