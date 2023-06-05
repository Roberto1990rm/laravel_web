<style>
    .bg-warning {
        background-color: #ffc107;
        padding: 20px;
        text-align: center;
        display: inline-block;
    }

    .blinking {
        animation: blinking 1s infinite;
    }

    @keyframes blinking {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .logo {
        width: 25px;
        height: 25px;
        margin: 3px;
    }

    .counter {
        background-color: #dc3545;
        color: white;
        border-radius: 50%;
        width: 100px;
        height: 100px;
        line-height: 150px;
        font-size: 24px;
        position: relative;
        margin: 10px auto;
        animation: heartbeat 1s infinite;
    }

    .counter h6 {
        margin-top: 5px;
        font-size: 14px;
    }

    @keyframes heartbeat {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(1);
        }
    }

    .button-container {
        margin-top: 10px;
    }

    .button-container button {
        padding: 10px 20px;
        font-size: 18px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .button-container button:hover {
        background-color: #0056b3;
    }


    .refresh-text {
        margin-top: 10px;
        font-size: 14px;
    }
</style>

<div class="bg-warning" style="opacity: 0.6;">
    <div class="blinking blinking">
        <div id="logoContainer">
            <div class="text-center">
                <div class="mt-1 mb-1">
                    <div class="counter">
                        <h6>Llevas</h6>
                        <span id="counter">0</span>
                    </div>
                </div>
                
                <div class="refresh-text">
                    <span id="refreshText"></span>
                    <i class="bi bi-emoji-smile"></i>
                </div>
                <div class="button-container">
                    <button id="incrementButton">Pedir</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const incrementButton = document.getElementById('incrementButton');
    const counterElement = document.getElementById('counter');
    const logoContainer = document.getElementById('logoContainer');
    const refreshText = document.getElementById('refreshText');

    let counter = 0;

    incrementButton.addEventListener('click', () => {
        counter++;
        counterElement.textContent = counter;
        const logo = document.createElement('img');
        logo.setAttribute('class', 'logo');
        logo.setAttribute('src', '{{ asset('img/logo.webp') }}');
        logo.setAttribute('alt', 'Logo de la cerveza');
        logoContainer.appendChild(logo);

        if (counter === 0) {
            refreshText.textContent = "¡Refréscate!";
        } else if (counter === 1) {
            refreshText.textContent = "¡Qué bien sienta!";
        } else if (counter >= 2 && counter <= 5) {
            refreshText.textContent = "Cervezas";
        } else {
            refreshText.textContent = "Si vas a desplazarte ¡pide que te lleven!";
            refreshText.classList.add('text-info');
        }
    });
</script>
