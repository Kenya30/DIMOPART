const todasLasPreguntas = [
    {
        pregunta: "¿Qué ventaja tiene un SSD sobre un HDD?",
        opciones: ["Mayor capacidad siempre", "Mayor velocidad de lectura y escritura", "Puede reproducir sonido directamente"],
        respuesta: "Mayor velocidad de lectura y escritura"
    },
    {
        pregunta: "¿Qué función principal tiene el lente de la cámara en un dispositivo móvil?",
        opciones: ["El lente enfoca la luz", "Medir luz", "Detectar rotación", "Capturar movimientos"],
        respuesta: "El lente enfoca la luz"
    },
    {
        pregunta: "¿Cuál de estos componentes afecta directamente la calidad de los videojuegos y animaciones?",
        opciones: ["El sensor de movimiento", "La GPU", "La batería", "El CPU"],
        respuesta: "La GPU"
    },
    {
        pregunta: "¿Qué parte del celular permite ejecutar el sistema operativo y procesar tareas?",
        opciones: ["La RAM", "La ROM", "El procesador", "La GPU"],
        respuesta: "El procesador"
    },
    {
        pregunta: "¿Cuál es el cerebro del teléfono?",
        opciones: ["El procesador SoC", "GPU", "El almacenamiento"],
        respuesta: "El procesador SoC"
    },
    {
        pregunta: "¿Qué componente controla la energía que recibe cada parte del celular, laptop y tablet?",
        opciones: ["El procesador", "El controlador de energía (power IC)", "El módem"],
        respuesta: "El controlador de energía (power IC)"
    },
    {
        pregunta: "¿Cuál de estos componentes se encarga de guardar los datos aunque el teléfono esté apagado?",
        opciones: ["RAM", "GPU", "ROM"],
        respuesta: "ROM"
    },
    {
        pregunta: "¿Con cuántos micrófonos cuenta un teléfono convencional?",
        opciones: ["1", "2", "3", "4"],
        respuesta: "2"
    },
    {
        pregunta: "¿Qué es un cable flexible (FFC)?",
        opciones: ["Un cable USB reforzado", "Un cable plano y delgado que conecta componentes internos como teclado o pantalla", "Un cable de red Wi-Fi externo"],
        respuesta: "Un cable plano y delgado que conecta componentes internos como teclado o pantalla"
    },
    {
        pregunta: "¿Qué tipo de almacenamiento suele tener una tablet integrado en la placa madre?",
        opciones: ["Disco duro mecánico (HDD)", "Tarjeta SD interna", "Almacenamiento flash tipo eMMC o UFS"],
        respuesta: "Almacenamiento flash tipo eMMC o UFS"
    },
    {
        pregunta: "¿Qué componente permite que la tablet se comunique con redes Wi-Fi y esté en la placa madre?",
        opciones: ["El lector de huellas", "El chip Wi-Fi integrado", "El procesador gráfico (GPU)"],
        respuesta: "El chip Wi-Fi integrado"
    },
    {
        pregunta: "¿Cuál es la función principal de la placa madre en una laptop?",
        opciones: ["Almacenar todos los archivos y documentos del usuario.", "Conectar y permitir la comunicación entre todos los componentes internos de la laptop", "Proveer energía directamente a la pantalla táctil"],
        respuesta: "Conectar y permitir la comunicación entre todos los componentes internos de la laptop"
    }
];

const nombreUsuario = prompt("¿Cómo te llamas?");
function obtenerPreguntasAleatorias(lista, cantidad) {
    return lista.sort(() => Math.random() - 0.5).slice(0, cantidad);
}

const preguntas = obtenerPreguntasAleatorias(todasLasPreguntas, 4);
let actual = 0;
let puntos = 0;

const preguntaEl = document.getElementById("question");
const opcionesEl = document.getElementById("options");
const puntuacionEl = document.getElementById("score");
const contenedor = document.getElementById("game-container");
const restartButton = document.getElementById("restart-button");
const exitButton = document.getElementById("exit-button");
let mensajeFinal = null;

function mostrarPregunta() {
    const p = preguntas[actual];
    preguntaEl.textContent = p.pregunta;
    opcionesEl.innerHTML = "";

    p.opciones.forEach(opcion => {
        const boton = document.createElement("button");
        boton.textContent = opcion;
        boton.className = "option-button";
        boton.onclick = () => {
            if (opcion === p.respuesta) puntos++;
            actual++;
            if (actual < preguntas.length) {
                mostrarPregunta();
            } else {
                finalizarJuego();
            }
        };
        opcionesEl.appendChild(boton);
    });
}

function lanzarConfeti() {
    for (let i = 0; i < 30; i++) {
        const emoji = document.createElement("div");
        emoji.textContent = "🎉";
        emoji.className = "confetti";
        emoji.style.left = Math.random() * 100 + "%";
        emoji.style.animationDuration = 2 + Math.random() * 2 + "s";
        contenedor.appendChild(emoji);
        setTimeout(() => emoji.remove(), 4000);
    }
}

function finalizarJuego() {
    preguntaEl.textContent = "¡Juego terminado!";
    opcionesEl.innerHTML = "";
    puntuacionEl.textContent = `Puntuación final: ${puntos} / ${preguntas.length}`;

    if (!mensajeFinal) {
        mensajeFinal = document.createElement("div");
        mensajeFinal.style.marginTop = "16px";
        mensajeFinal.style.fontSize = "20px";
        mensajeFinal.style.fontWeight = "bold";
        mensajeFinal.style.color = "#2e7d32";

        if (puntos === preguntas.length) {
            mensajeFinal.textContent = `🎊 ¡Felicidades, ${nombreUsuario}! 🎊`;
            lanzarConfeti();
        } else {
            mensajeFinal.textContent = `👍 Lo hiciste bien, te esforzaste, ${nombreUsuario}.`;
        }
        contenedor.appendChild(mensajeFinal);
    }

    restartButton.style.display = "inline-block";
    exitButton.style.display = "inline-block";
}

restartButton.onclick = () => {
    puntos = 0;
    actual = 0;
    mensajeFinal = null;
    preguntas.length = 0;
    preguntas.push(...obtenerPreguntasAleatorias(todasLasPreguntas, 4));
    preguntaEl.textContent = "Cargando pregunta...";
    puntuacionEl.textContent = "Puntuación: 0";
    opcionesEl.innerHTML = "";
    restartButton.style.display = "none";
    exitButton.style.display = "none";
    mostrarPregunta();
};

exitButton.onclick = () => {
    window.location.href = "panel.php";
};

mostrarPregunta();
