<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/js/app.js')    

</head>
<body>
    <div x-data="{ number: 5 }">
        <div x-data="{ count: 0 }" x-modelable="count" x-model="number">
            <button @click="count++">Increment</button>
        </div>
        Number: <span x-text="number"></span>
    </div>

    <a href="game">
        Index
     </a>
</body>
</html>
