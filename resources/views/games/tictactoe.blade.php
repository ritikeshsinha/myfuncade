<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic-Tac-Toe (vs Computer)</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fbc2eb, #a6c1ee, #f6d365);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            height: 100vh;
            overflow: hidden;
        }
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        h2 { 
            color: #333; 
            margin-top: 20px;
        }
        .game-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            display: inline-block;
            margin-top: 30px;
        }
        .board { 
            display: grid; 
            grid-template-columns: repeat(3, 100px); 
            gap: 5px; 
            margin: 20px auto; 
            width: 310px; 
        }
        .cell { 
            width: 100px; 
            height: 100px; 
            font-size: 2em; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            border: 2px solid #333; 
            cursor: pointer; 
            background-color: #fff; 
            transition: background-color 0.3s, transform 0.2s;
            border-radius: 10px;
        }
        .cell:hover { 
            background-color: #e0e0e0; 
            transform: scale(1.05);
        }
        .cell.taken { 
            cursor: not-allowed; 
            background-color: #ccc;
        }
        .win-line {
            position: absolute;
            background-color: #ff4757;
            height: 5px;
            transform-origin: 0 0;
            animation: drawLine 0.5s ease-out;
        }
        @keyframes drawLine {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }
        button { 
            padding: 10px 15px; 
            font-size: 1em; 
            margin: 10px; 
            border: none; 
            cursor: pointer; 
            border-radius: 5px;
            transition: 0.3s;
        }
        .reset-btn {
            background-color: #007bff;
            color: white;
        }
        .reset-btn:hover {
            background-color: #0056b3;
        }
        .back-btn {
            background-color: #ff4747;
            color: white;
        }
        .back-btn:hover {
            background-color: #c82333;
        }
        .music-btn {
            background-color: #28a745;
            color: white;
        }
        .music-btn:hover {
            background-color: #218838;
        }
        #status {
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }
    </style>
</head>
<body>

    <h2>Tic-Tac-Toe (vs Computer)</h2>
    <div class="game-container">
        <div class="board" id="board"></div>
        <p id="status"></p>
        <button class="reset-btn" onclick="resetGame()">Reset Game</button>
        <button class="music-btn" onclick="startMusic()">Start Music</button>
        <button class="back-btn" onclick="goBack()">Back</button>
    </div>

    <!-- Sound Effects -->
    <audio id="move-sound">
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
    </audio>
    <audio id="win-sound">
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3" type="audio/mpeg">
    </audio>
    <audio id="draw-sound">
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3" type="audio/mpeg">
    </audio>
    <audio id="reset-sound">
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-4.mp3" type="audio/mpeg">
    </audio>
    <audio id="background-music" loop>
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-5.mp3" type="audio/mpeg">
    </audio>

    <script>
        const board = document.getElementById("board");
        const statusText = document.getElementById("status");
        let cells = ["", "", "", "", "", "", "", "", ""];
        let currentPlayer = "X"; // User starts first
        let gameActive = true;

        // Sound Effects
        const moveSound = document.getElementById("move-sound");
        const winSound = document.getElementById("win-sound");
        const drawSound = document.getElementById("draw-sound");
        const resetSound = document.getElementById("reset-sound");
        const backgroundMusic = document.getElementById("background-music");

        function startMusic() {
            backgroundMusic.play();
            document.querySelector(".music-btn").textContent = "Music Playing 🎵";
            document.querySelector(".music-btn").disabled = true;
        }

        function createBoard() {
            board.innerHTML = "";
            cells.forEach((cell, index) => {
                const div = document.createElement("div");
                div.classList.add("cell");
                div.dataset.index = index;
                div.addEventListener("click", makeMove);
                div.textContent = cell;
                board.appendChild(div);
            });
        }

        function makeMove(event) {
            if (!gameActive || currentPlayer !== "X") return;

            const index = event.target.dataset.index;
            if (cells[index]) return;

            cells[index] = "X";
            event.target.textContent = "X";
            event.target.classList.add("taken");

            // Play move sound
            moveSound.currentTime = 0;
            moveSound.play();

            if (checkWinner("X")) {
                statusText.textContent = "🎉 You Win! 🎉";
                gameActive = false;
                drawWinningLine();
                // Play win sound
                winSound.currentTime = 0;
                winSound.play();
                return;
            }

            if (!cells.includes("")) {
                statusText.textContent = "😃 It's a Draw!";
                gameActive = false;
                // Play draw sound
                drawSound.currentTime = 0;
                drawSound.play();
                return;
            }

            currentPlayer = "O"; // Switch to Computer
            statusText.textContent = "Computer's Turn...";
            setTimeout(computerMove, 500);
        }

        function computerMove() {
            if (!gameActive) return;

            let emptyCells = cells.map((cell, index) => (cell === "" ? index : null)).filter(index => index !== null);
            let randomIndex = emptyCells[Math.floor(Math.random() * emptyCells.length)];

            cells[randomIndex] = "O";
            document.querySelector(`.cell[data-index='${randomIndex}']`).textContent = "O";
            document.querySelector(`.cell[data-index='${randomIndex}']`).classList.add("taken");

            // Play move sound
            moveSound.currentTime = 0;
            moveSound.play();

            if (checkWinner("O")) {
                statusText.textContent = "💻 Computer Wins!";
                gameActive = false;
                drawWinningLine();
                // Play win sound
                winSound.currentTime = 0;
                winSound.play();
                return;
            }

            if (!cells.includes("")) {
                statusText.textContent = "😃 It's a Draw!";
                gameActive = false;
                // Play draw sound
                drawSound.currentTime = 0;
                drawSound.play();
                return;
            }

            currentPlayer = "X"; // Switch back to User
            statusText.textContent = "Your Turn!";
        }

        function checkWinner(player) {
            const winPatterns = [
                [0, 1, 2], [3, 4, 5], [6, 7, 8],
                [0, 3, 6], [1, 4, 7], [2, 5, 8],
                [0, 4, 8], [2, 4, 6]
            ];

            return winPatterns.some(pattern => {
                const [a, b, c] = pattern;
                return cells[a] === player && cells[b] === player && cells[c] === player;
            });
        }

        function drawWinningLine() {
            const winPatterns = [
                [0, 1, 2], [3, 4, 5], [6, 7, 8],
                [0, 3, 6], [1, 4, 7], [2, 5, 8],
                [0, 4, 8], [2, 4, 6]
            ];

            for (const pattern of winPatterns) {
                const [a, b, c] = pattern;
                if (cells[a] && cells[a] === cells[b] && cells[a] === cells[c]) {
                    const cellA = document.querySelector(`.cell[data-index='${a}']`);
                    const cellC = document.querySelector(`.cell[data-index='${c}']`);
                    const rectA = cellA.getBoundingClientRect();
                    const rectC = cellC.getBoundingClientRect();

                    const line = document.createElement("div");
                    line.classList.add("win-line");
                    line.style.width = `${Math.hypot(rectC.left - rectA.left, rectC.top - rectA.top)}px`;
                    line.style.left = `${rectA.left + rectA.width / 2}px`;
                    line.style.top = `${rectA.top + rectA.height / 2}px`;
                    line.style.transform = `rotate(${Math.atan2(rectC.top - rectA.top, rectC.left - rectA.left)}rad)`;
                    document.body.appendChild(line);
                    break;
                }
            }
        }

        function resetGame() {
            cells = ["", "", "", "", "", "", "", "", ""];
            currentPlayer = "X";
            gameActive = true;
            statusText.textContent = "Your Turn!";
            createBoard();
            document.querySelectorAll(".win-line").forEach(line => line.remove());
            // Play reset sound
            resetSound.currentTime = 0;
            resetSound.play();
        }

        function goBack() {
            window.history.back();
        }

        createBoard();
        statusText.textContent = "Your Turn!";
    </script>

</body>
</html>