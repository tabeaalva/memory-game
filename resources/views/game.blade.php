<x-main>

    <body class=" bg-zinc-100 dark:bg-gray-900 h-full">
        <div x-data="game()" >
            <div class="flex min-w-full">
                <h1 class="text-5xl font-semibold m-2 dark:text-gray-100">Memory Game</h1>
                <div class="p-4 mr-4 ml-auto">
                    <span class="isolate inline-flex rounded-md shadow-sm mb-2">
                        <a href="/" type="button"
                            class=" w-20 relative inline-flex items-center rounded-md border border-gray-300 bg-gray-400 px-4 py-2 text-lg font-medium text-black dark:text-gray-900 hover:bg-gray-200 focus:z-10 focus:outline-none focus:ring-1">
                            <!-- Heroicon name: mini/bookmark -->
                            Back
                        </a>
                    </span>
                    <br>
                    <span class="isolate inline-flex rounded-md shadow-sm">
                        <a href="/game" type="button"
                            class="w-20 relative inline-flex items-center rounded-md border border-gray-300 bg-gray-400 px-4 py-2 text-lg font-medium text-black dark:text-gray-900 hover:bg-gray-200 focus:z-10  focus:outline-none focus:ring-1 ">
                            <!-- Heroicon name: mini/bookmark -->

                            Reset
                        </a>
                    </span>
                </div>
            </div>
            <div>
                <p class="dark:text-white ml-4 mb-8">User: {{$username}}</p>
            </div>


            <div class="dark:text-white ml-4">
                <p x-text="'Remaining time: ' + time" class="mb-2 text-lg"></p>
                <button x-on:click="start()"
                    class="w-14 h-8 relative inline-flex items-center rounded-md border border-gray-300 bg-gray-400 p-2 text-sm font-medium text-black dark:text-gray-900 hover:bg-gray-200 focus:z-10 focus:outline-none focus:ring-1">Start</button>
            </div>
            <div class="px-10 flex items-center justify-center mt-12">
                <div class="flex-1 grid grid-cols-4 gap-10">
                    <template x-for="card in cards">
                        <div>
                            <button 
                                class="w-full h-32 bg-gray-400 dark:bg-gray-300"
                                :disabled="flippedCards.length >= 2 || card.cleared || !isRunning()"
                                :style=" (card.flipped ? 'background: ' + card.color : '')"
                                :class="(card.cleared? 'invisible' : '')" @click="flipCard(card)">
                            </button>
                        </div>
                    </template>
                </div>
            </div>

            <script>
                function pause(milliseconds = 1000) {
            return new Promise(resolve => setTimeout(resolve, milliseconds));
        } 

        function game() {
            return {
                gameTimer: null,
                time: 45,
                cards: [ 
                    {color: 'green', flipped: false, cleared: false },
                    {color: 'blue', flipped: false, cleared: false },
                    {color: 'yellow', flipped: false, cleared: false },
                    {color: 'red', flipped: false, cleared: false },
                    {color: 'blue', flipped: false, cleared: false },
                    {color: 'orange', flipped: false, cleared: false },
                    {color: 'orange', flipped: false, cleared: false },
                    {color: 'red', flipped: false, cleared: false },
                    {color: 'yellow', flipped: false, cleared: false },
                    {color: 'green', flipped: false, cleared: false },
                    {color: 'pink', flipped: false, cleared: false },
                    {color: 'pink', flipped: false, cleared: false },
                ].sort(() => Math.random() - .5),

                counter: 0,

                start() { 
                    if (this.gameTimer !== null) {
                        return
                    } 
                    this.gameTimer = setInterval(() => {
                        if (this.time === 0) {
                            clearInterval(this.gameTimer);
                            window.location.href = '/end';
                        }
                        this.time--;
                    }, 1000); 
                },
                clear() { 
                    clearInterval(this.gameTimer);
                    this.time = 45;
                    this.gameTimer = null;
                },
                isRunning() { 
                    return this.gameTimer !== null
                },

                get flippedCards() {       
                    return this.cards.filter(card => card.flipped);
                },

                get clearedCards() {
                    return this.cards.filter(card => card.cleared);
                },

                get remainingCards() {
                    return this.cards.filter(card => ! card.cleared);
                },

                async flipCard(card) {
                    
                    card.flipped = ! card.flipped;

                    if (this.flippedCards.length !== 2)return;

                    this.counter++;

                    if (this.hasMatch()) {

                        await pause();
                                
                        this.flippedCards.forEach(card => card.cleared = true);

                            
                         if(! this.remainingCards.length) {
                            window.location.href = '/end';
                        }
                        } else {
                            await pause();
                        }
                        this.flippedCards.forEach(card => card.flipped = false);
                    },

                    hasMatch() {
                        return this.flippedCards[0]['color'] === this.flippedCards[1]['color'];
                    }
            };
        }
            </script>
        </div>
    </body>
</x-main>