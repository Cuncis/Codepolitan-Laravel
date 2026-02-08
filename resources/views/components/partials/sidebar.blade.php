<div>
    <h2 class="font-bold text-2xl mb-2">Menu</h2>
    <ul class="space-y-4">
        @foreach ($menus as $menu)
            <li><a href="{{ $menu['link'] }}" class="text-blue-400 hover:underline">{{ $menu['title'] }}</a></li>
        @endforeach
    </ul>
</div>