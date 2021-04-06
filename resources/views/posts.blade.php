<x-app-layout>
    @foreach ($posts as $post)
        @if($post->published == 1)
        <div class="border border-black mb-2">
            <h1 class="text-2xl">User ID: {{ $post->id }} Title : {{$post->title}}</h1>
            <p>Body : {{$post->body}}</p>
            <a class="hover:underline" href="{{route('public_posts_show', $post->id)}}">View</a>
        </div>
        @endif
    @endforeach
</x-app-layout>
