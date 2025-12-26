<div>
    <h2>{{ $title }}</h2>

    <form action="{{ $action }}" method="POST">
        @csrf
        @if($method !== 'POST')
        @method($method)
        @endif

        {{ $slot }}

        <div class="mt-4 flex gap-4">
            <a href="{{ $cancel }}">Cancel</a>

            <button type="submit">
                {{ $submit }}
            </button>
        </div>

        @if ($errors->any())
        <ul class="mt-4 text-red-500">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </form>
</div>
