const sensores = document.querySelectorAll('.sensor');
const infoBox = document.getElementById('infoBox');
const infoTexto = document.getElementById('infoTexto');
const contenedorImagen = document.querySelector('.contenedor-imagen');

sensores.forEach(sensor => {
    sensor.addEventListener('click', (event) => {
        const info = sensor.dataset.info;
        infoTexto.textContent = info;
        infoBox.style.display = 'block';

        // Posiciona la caja de información cerca del sensor
        const sensorRect = sensor.getBoundingClientRect();
        const contenedorRect = contenedorImagen.getBoundingClientRect();
        const offsetX = event.clientX - contenedorRect.left;
        const offsetY = event.clientY - contenedorRect.top;

        // Ajusta la posición para que no se salga de la pantalla
        let boxX = offsetX + 10;
        let boxY = offsetY + 10;

        if (boxX + infoBox.offsetWidth > window.innerWidth) {
            boxX = offsetX - infoBox.offsetWidth - 10;
        }

        if (boxY + infoBox.offsetHeight > window.innerHeight) {
            boxY = offsetY - infoBox.offsetHeight - 10;
        }

        infoBox.style.left = `${boxX}px`;
        infoBox.style.top = `${boxY}px`;
    });
});

document.addEventListener('click', (event) => {
    if (!event.target.classList.contains('sensor') && event.target !== infoBox && !infoBox.contains(event.target)) {
        infoBox.style.display = 'none';
    }
});