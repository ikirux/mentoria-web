<x-layout>
    <x-slot name="content">
        @foreach ($posts as $post)
            <p>{{ $post->title }}</p>
        @endforeach
    </x-slot>
</x-layout>