<ul class="flex items-center gap-4 text-sm">
    <li>{{ Auth::user()->name }}</li>

    <li>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn-secondary">Logout</button>
        </form>
    </li>
</ul>
