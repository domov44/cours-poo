<!DOCTYPE html>
<html>
<head>
    <title>Créer un nouvel article</title>
</head>
<body>
    <h1>Créer un nouvel article</h1>

    <form method="POST" action="{{ route('articles.save') }}">
        @csrf
        <div>
            <label for="author">Author :</label>
            <input type="text" id="author" name="author">
        </div>

        <div>
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title">
        </div>

        <div>
            <label for="content">Contenu :</label>
            <textarea id="content" name="content"></textarea>
        </div>

        <button type="submit">Créer l'article</button>
    </form>
</body>
</html>
