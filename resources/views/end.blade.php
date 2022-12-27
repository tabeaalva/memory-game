<x-main>

<body class=" max-w-md ml-auto mr-auto items-center bg-zinc-100 dark:bg-gray-900 grid place-items-center">
  <h1 class="text-5xl font-semibold mt-16 dark:text-gray-300">Memory Game</h1>
  <div class="mt-14 font-medium text-xl dark:text-gray-300">
    <p class="mb-2" x-text="name">User: {{$username}} </p>
    <p>Time:</p>
  </div>

  <span class="isolate inline-flex rounded-md shadow-sm">
    <a href="/game" type="button"
      class=" m-4 absolute bottom-0 left-0 inline-flex items-center rounded-md border border-gray-300 bg-gray-400 px-4 py-2 text-lg font-medium text-black dark:text-gray-900 hover:bg-gray-200 focus:z-10 focus:outline-none focus:ring-1">
      Go again
    </a>
  </span>
  <span class="isolate inline-flex rounded-md shadow-sm">
    <a href="/" type="button"
      class="m-4 absolute bottom-0 right-0 inline-flex items-center rounded-l-md border border-gray-300 bg-gray-400 px-4 py-2 text-lg font-medium text-black dark:text-gray-900 hover:bg-gray-200 focus:z-10 focus:outline-none focus:ring-1">
      Change name
    </a>
  </span>
</body>
</x-main>
