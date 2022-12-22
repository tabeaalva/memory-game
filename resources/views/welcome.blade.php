<x-head></x-head>

<body class="bg-zinc-100 max-w-xl ml-auto mr-auto items-center dark:bg-gray-900 grid place-items-center">
  <h1 class="text-5xl font-semibold mt-12 dark:text-gray-300">Memory Game</h1>
  <div x-data="{username: ''}">
    <div class="flex mt-16">
      <label class="mr-4 text-xl font-medium dark:text-gray-300 text-gray-700">Choose your username</label>
      <div class="mt-1">
        <input type="text" x-model="username" name="name"
          class="mb-6 block w-64 h-10 rounded-lg border-gray-300 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
          placeholder="memoryGameMaster">
      </div>
    </div>

    <span class="isolate inline-flex rounded-md shadow-sm">
      <a href="/game" x-on:click="username = 'changed'" type="button"
        class="mt-6 w-96 relative items-center rounded-md border border-gray-300 bg-gray-300 px-20 py-2 text-3xl font-medium text-black dark:text-gray-900 hover:bg-gray-200 focus:z-10 focus:outline-none focus:ring-1">
        <!-- Heroicon name: mini/bookmark -->
        Start the game
      </a>
    </span>
  </div>
  <p class=" mt-96 text-lg dark:text-gray-300">
    *Find two matching colours to complete the game*
  </p>
</body>

</html>