@extends('layouts.layout')

@section('title', 'Articles')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-4">Articles</h1>
    <a href="/articles/creer" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded inline-block mb-4">Ajouter un article</a>
    @if (session('success'))
    <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @foreach($articles as $article)
    <div class="bg-white shadow-md rounded px-8 py-6 mb-4">
        <h2 class="text-2xl font-semibold mb-2">{{ $article->title }}</h2>
        <p class="text-gray-600 mb-2">Auteur: {{ $article->author }}</p>
        <p class="text-gray-800">{{ $article->content }}</p>
        <div class="mt-4">
            <form action="{{ route('articles.delete', ['id' => $article->id]) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded inline-block">Supprimer</button>
            </form>
            <a href="{{ route('articles.edit', ['id' => $article->id]) }}" class="ml-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-4 py-2 rounded inline-block">Modifier</a>
        </div>
    </div>
    @endforeach
</div>
@endsection