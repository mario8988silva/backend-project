<div class="card max-w-3xl mx-auto">

    <h2 class="mb-6">{{ $title }}</h2>

    <form action="{{ $action }}" method="POST" class="space-y-6">
        @csrf
        @if($method !== 'POST')
            @method($method)
        @endif

        {{-- Form fields --}}
        <div class="space-y-4">
            {{ $slot }}
        </div>

        {{-- Actions --}}
        <div class="flex gap-4 pt-4 border-t border-gray-200">
            <a href="{{ $cancel }}" class="btn-secondary">
                Cancel
            </a>

            <button type="submit" class="btn-primary">
                {{ $submit }}
            </button>
        </div>

        {{-- Errors --}}
        @if ($errors->any())
            <ul class="mt-4 text-red-600 space-y-1">
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>

</div>
