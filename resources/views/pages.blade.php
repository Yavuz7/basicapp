<x-app-layout>
    @foreach ($pages as $page)
        @if($page->published == 1)
            <x-jet-nav-link href="{{ route('pages_show', $page->id) }}" :active="request()->routeIs('pages_show')">
                {{ ($page->title) }}
            </x-jet-nav-link>
        @endif
    @endforeach
</x-app-layout>
