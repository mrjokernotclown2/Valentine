<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Be My Valentine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="mobile.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <style>
        body {
            height: 100vh;
            background: linear-gradient(45deg, #ff6b6b, #ff8e8e, #ff6b6b);
            background-size: 400% 400%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            animation: gradient 15s ease infinite;
            overflow: hidden;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .valentine-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            max-width: 450px;
            margin: auto;
            transform: translateY(0);
            animation: float 6s ease-in-out infinite;
            position: relative; /* Ensure this is present */
            overflow: hidden; /* Add this to contain the button */
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .cute-gif {
            width: 250px;
            margin-bottom: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: scale(1);
            transition: transform 0.3s ease;
        }

        .cute-gif:hover {
            transform: scale(1.05);
        }

        h2 {
            font-family: 'Dancing Script', cursive;
            font-size: 2.5em;
            color: #ff4b6e;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .btn {
            padding: 12px 30px;
            font-size: 1.1em;
            border-radius: 50px;
            transition: all 0.3s ease;
            margin: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        #yesBtn {
            background: linear-gradient(45deg, #ff4b6e, #ff8080);
            border: none;
            color: white;
            
        }

        #yesBtn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255,75,110,0.3);
        }

        #noBtn {
            background: white;
            border: 2px solid #ff4b6e;
            color: #ff4b6e;
            position: absolute;
            transition: all 0.3s ease;
            /* Add constraints */
            max-width: 90%;
            max-height: 90%;
        }

        #noBtn:hover {
            background: #ff4b6e;
            color: white;
        }
        .hearts {
            position: fixed;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 10px;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            color: white;
            font-size: 0.9em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        .footer a {
            color: #ff4b6e;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .footer a:hover {
            color: #ff8080;
        }
    </style>
</head>
<body>
    <div class="hearts"></div>
    <div class="container">
        <div class="valentine-card">
            <div class="text-center">
                <img src="https://media3.giphy.com/media/PR7zNUghf2Ku3Nbta5/giphy.gif?cid=6c09b952fnmzkk8wnm1qjcyatvc8cdmmgvl388p17dr1tzpf&ep=v1_stickers_search&rid=giphy.gif&ct=s" class="cute-gif" alt="Cute Valentine Bear">
                <h2 class="mb-4">Can you be my Valentine?</h2>
            </div>
            <div class="" style="margin-left: 80px;">
                <button id="yesBtn" class="btn btn-success btn-lg">Yes</button>
                <button id="noBtn" class="btn btn-danger btn-lg">No</button>
            </div>
        </div>
    </div>

    <footer class="footer">
        Created by Vherner G.
    </footer>

    <script>
        const noBtn = document.getElementById('noBtn');
        const yesBtn = document.getElementById('yesBtn');

        noBtn.addEventListener('mouseover', function() {
            const cardRect = document.querySelector('.valentine-card').getBoundingClientRect();
            const btnRect = this.getBoundingClientRect();
            
            const maxX = cardRect.width - btnRect.width;
            const maxY = cardRect.height - btnRect.height;
            
            const x = Math.random() * maxX;
            const y = Math.random() * maxY;
            
            this.style.left = x + 'px';
            this.style.top = y + 'px';
        });

        yesBtn.addEventListener('click', function() {
            confetti({
                particleCount: 100,
                spread: 70,
                origin: { y: 0.6 }
            });
            
            document.querySelector('.valentine-card').innerHTML = `
                <div class="text-center">
                    <img src="https://s3.getstickerpack.com/storage/uploads/sticker-pack/funny-meme-gif-pack-small-version/sticker_6.gif?b353a73c46798a7e57d4b083aac5390b" class="cute-gif" alt="Happy Bear">
                    <h2 style="font-family: inherit;">ALAPAN</h2>
                    <p class="mt-3" style="font-size: 1.2em;">PAG LUGARING SA FEB 14 HAHAHAHA</p>
                </div>
            `;
        });

        // Add floating hearts background
        function createHeart() {
            const heart = document.createElement('div');
            heart.innerHTML = '❤️';
            heart.style.position = 'fixed';
            heart.style.fontSize = Math.random() * 20 + 10 + 'px';
            heart.style.left = Math.random() * 100 + 'vw';
            heart.style.animationDuration = Math.random() * 3 + 2 + 's';
            heart.style.opacity = Math.random() * 0.5 + 0.5;
            
            heart.style.animation = `
                fall ${Math.random() * 3 + 3}s linear forwards,
                sway ${Math.random() * 2 + 3}s ease-in-out infinite alternate
            `;
            
            document.querySelector('.hearts').appendChild(heart);
            
            setTimeout(() => {
                heart.remove();
            }, 5000);
        }

        setInterval(createHeart, 300);

        const styleSheet = document.createElement('style');
        styleSheet.textContent = `
            @keyframes fall {
                to { transform: translateY(100vh); }
            }
            @keyframes sway {
                from { margin-left: -20px; }
                to { margin-left: 20px; }
            }
        `;
        document.head.appendChild(styleSheet);
    </script>
</body>
</html>