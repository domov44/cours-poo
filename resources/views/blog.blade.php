<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
</head>
<body>
    <h1>Articles</h1>
    @foreach($articles as $article)
        <div class="article">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
            <p>{{ $article->author }}</p>
        </div>
    @endforeach
</body>
</html>
