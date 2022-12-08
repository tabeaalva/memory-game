<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>memory game</title>
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')    
</head>

<body>
    <div x-data="game()" class="px-10 flex items-center justify-center min-h-screen">
        <div class="flex-1 grid grid-cols-4 gap-10">
            <template x-for="card in cards">
                <div>
                <button x-show="! card.cleared" 
                :style="'background: ' + (card.flipped ? card.color : '#999')" 
                class="w-full h-32"
                @click="flipCard(card)"
                >
                </button>
            </div>
            </template>
        </div>
    </div>

    <script>
        function game() {
            return {
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
                ],

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

                    if (this.flippedCards.length !== 2) {
                        if (this.hasMatch()) {
                            this.flippedCards.forEach(card => card.cleared = true);
                                

                                if(! this.remainingCards.length) {
                                    redirect('/end');
                                }
                            }

                            setTimeout(() => {
                                this.flippedCards.forEach(card => card.flipped = false);
                            }, 1000);
                        }
                    },

                    hasMatch() {
                        return this.flippedCards[0]['color'] === this.flippedCards[1]['color'];
                    }
            };
        }
    </script>
</body>
</html>