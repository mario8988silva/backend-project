<div class="card">
{{ $slot }}
<a href="{{ $attributes->get('href') }}" class>View Details</a>
</div>

<!-- recorrer ao highlight e css para salientar determinados detalhes do producto, tais como se tem gluten (rue/false), etc