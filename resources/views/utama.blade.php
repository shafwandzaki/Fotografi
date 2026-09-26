<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dzaki | Fotografi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="custom-scrollbar bg-[#131315] text-white">
    <x-bg-utama/>
    <x-navbar/>
    <main>
        <x-home :home="$home"/>
        <x-fotografi :items="$fotografi" :genres="$genres"/>
        <x-gear :gear="$gear"/>
        <x-tools :tools="$tools"/>
        <x-karya :karya="$karya"/>
    </main>
    <x-footer></x-footer>
</body>
</html>