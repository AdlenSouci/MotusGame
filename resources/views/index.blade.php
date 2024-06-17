<x-app-layout>
    <div class="container mt-5">
        <div class="card card-3d" style="max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title display-6 fw-bolder">Bienvenue sur l'incroyable jeu Motus</h5>
                <p class="card-text lead">
                    Motus est un jeu où vous devez trouver le mot secret. Attention, vous avez 6 essais !
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <!-- jeu Motus -->
        <div id="game-board" class="game-board"></div>
        <div class="input-group mt-3 align-items-center" style="max-width: 300px;">
            <input type="text" id="guess-input" maxlength="5" class="form-control text-center rounded" placeholder="Entrez votre mot" required>
            <div class="input-group-append">
                <button id="guess-button" class="btn btn-primary">Deviner</button>
            </div>
        </div>
        <div id="message" class="mt-3 text-center"></div>
        <div id="login-message" class="mt-3 text-center text-danger" style="display: none;">Veuillez vous connecter pour jouer.</div>
        <div class="mt-3 text-center">
            <button id="replay-button" class="btn btn-secondary" style="display:none;">Rejouer</button>
        </div>
    </div>

    <input type="hidden" id="current-user-id" value="{{ Auth::id() }}">

    <script>
        let secretWord = '';
        let attempts = 0;
        const maxAttempts = 6;

        const userId = document.getElementById('current-user-id').value;
        const loginMessage = document.getElementById('login-message');
        const guessButton = document.getElementById('guess-button');
        const guessInput = document.getElementById('guess-input');

        document.addEventListener('DOMContentLoaded', () => {
            if (!userId) {
                loginMessage.style.display = 'block';
                guessButton.disabled = true;
                guessInput.disabled = true;
            } else {
                loginMessage.style.display = 'none';
                fetchSecretWord();
                guessButton.addEventListener('click', handleGuess);
                document.getElementById('replay-button').addEventListener('click', resetGame);
            }
        });

        function fetchSecretWord() {
            fetch("{{ route('index.secret-word') }}")
                .then(response => response.json())
                .then(data => {
                    secretWord = data.secret_word.toUpperCase();
                    initializeBoard();
                })
                .catch(error => console.error('Erreur lors du chargement du mot secret:', error));
        }

        function initializeBoard() {
            const gameBoard = document.getElementById('game-board');
            gameBoard.innerHTML = '';
            for (let i = 0; i < maxAttempts; i++) {
                const row = document.createElement('div');
                row.classList.add('row');
                for (let j = 0; j < 5; j++) {
                    const cell = document.createElement('div');
                    cell.classList.add('cell');
                    row.appendChild(cell);
                }
                gameBoard.appendChild(row);
            }
        }

        function handleGuess() {
            const guess = guessInput.value.toUpperCase();
            if (guess.length !== 5) {
                showMessage('Le mot doit contenir 5 lettres.');
                return;
            }
            attempts++;
            const result = checkGuess(guess);
            displayResult(result, guess);
            if (guess === secretWord) {
                showMessage('Félicitations ! Vous avez trouvé le mot.');
                disableInput();
            } else if (attempts >= maxAttempts) {
                showMessage('Désolé, vous avez épuisé vos tentatives. Le mot était ' + secretWord);
                disableInput();
            } else {
                showMessage('Essai ' + attempts + ' sur ' + maxAttempts);
            }
        }

        function checkGuess(guess) {
            const result = [];
            const secretArray = secretWord.split('');
            const guessArray = guess.split('');
            const marked = Array(secretArray.length).fill(false);

            for (let i = 0; i < guessArray.length; i++) {
                if (guessArray[i] === secretArray[i]) {
                    result.push({
                        letter: guessArray[i],
                        status: 'correct'
                    });
                    marked[i] = true;
                    guessArray[i] = null;
                } else {
                    result.push(null);
                }
            }

            for (let i = 0; i < guessArray.length; i++) {
                if (guessArray[i] !== null) {
                    const foundIndex = secretArray.findIndex((letter, index) => letter === guessArray[i] && !marked[index]);
                    if (foundIndex !== -1) {
                        result[i] = {
                            letter: guessArray[i],
                            status: 'present'
                        };
                        marked[foundIndex] = true;
                        guessArray[i] = null;
                    }
                }
            }

            for (let i = 0; i < result.length; i++) {
                if (result[i] === null) {
                    result[i] = {
                        letter: guess[i],
                        status: 'absent'
                    };
                }
            }

            return result;
        }

        function displayResult(result, guess) {
            const gameBoard = document.getElementById('game-board');
            const row = gameBoard.children[attempts - 1];
            const cells = row.children;
            for (let i = 0; i < cells.length; i++) {
                cells[i].textContent = guess[i];
                cells[i].classList.add(result[i].status);
            }
        }

        function disableInput() {
            guessButton.disabled = true;
            guessInput.disabled = true;
            const replayButton = document.getElementById('replay-button');
            replayButton.style.display = 'block';
        }

        function showMessage(message) {
            const messageDiv = document.getElementById('message');
            messageDiv.textContent = message;
        }

        function resetGame() {
            attempts = 0;
            secretWord = '';
            guessButton.disabled = false;
            guessInput.disabled = false;
            guessInput.value = '';
            const replayButton = document.getElementById('replay-button');
            replayButton.style.display = 'none';
            showMessage('');
            fetchSecretWord();
        }
    </script>
</x-app-layout>
