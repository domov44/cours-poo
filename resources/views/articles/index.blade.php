<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
</head>
<body>
    <h1>Articles</h1>
    <a href="/articles/creer">Ajouter un article</a>
    @foreach($articles as $article)
        <div class="article">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->author }}</p>
            <p>{{ $article->content }}</p>
            <form action="{{ route('articles.delete', ['id' => $article->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
                <a href="{{ route('articles.edit', ['id' => $article->id]) }}">Modifier</a>
            </form>
        </div>
    @endforeach
</body>
</html>
