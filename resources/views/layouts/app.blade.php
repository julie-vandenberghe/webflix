<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="/">Accueil</a>
        <a href="/julie">Présentation</a>
        <a href="/julie?color=blue">Julie Bleue</a>
        <a href="/julie/angèle">Julie et Angèle</a>
        <a href="/julie/loki🐱">Julie et Loki 🐱</a>
    </nav>   



    @yield('content')
    <footer>Webflix &copy; {{date ('Y') }} </footer>
</body>
</html>