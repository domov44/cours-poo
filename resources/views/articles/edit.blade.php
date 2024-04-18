<!DOCTYPE html>
<html>
<head>
    <title>Modifier l'article</title>
</head>
<body>
    <h1>Modifier l'article  {{ $article->title }}</h1>
    <form action="{{ route('articles.update', ['id' => $article->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title" value="{{ $article->title }}"><br><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content">{{ $article->content }}</textarea><br><br>
        <label for="author">Auteur</label><br>
        <input type="text" id="author" name="author" value="{{ $article->author }}"><br><br>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
