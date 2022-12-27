<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Memory Game</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
         if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
             document.documentElement.classList.add('dark');
         } else {
             document.documentElement.classList.remove('dark')
         }
    </script>
        {{-- <x-data>{{username}}</x-data> --}}
        @vite('resources/js/app.js') 
        
</head>

{{$slot}}

</html>