<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

</head>
<body>
    <nav class="bg-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <a href="/" class="flex items-center space-x-3">
              <span class="self-center text-2xl font-semibold whitespace-nowrap">Accueil</span>
          </a>
        <a href="/a-propos" class="block py-2 px-3 text-white bg-gray-700 rounded">À propos</a>
        <a href="/julie" class="block py-2 px-3 text-white bg-gray-700 rounded">Présentation</a>
        <a href="/julie?color=blue" class="block py-2 px-3 text-white bg-gray-700 rounded">Julie Bleue</a>
        <a href="/julie/angèle" class="block py-2 px-3 text-white bg-gray-700 rounded">Julie et Angèle</a>
        <a href="/julie/loki" class="block py-2 px-3 text-white bg-gray-700 rounded">Julie et Loki 🐱</a>
        
    </nav>   


    <div class="max-w-screen-xl flex flex-col flex-wrap items-center justify-between mx-auto p-4">
        @yield('content')
    </div>

    <footer class="bg-gray-200 text-center py-2">Webflix &copy; {{date ('Y') }} </footer>
</body>
</html>