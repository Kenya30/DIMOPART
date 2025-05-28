<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica - DimoPart</title>
    <link rel="stylesheet" href="estilopanel.css">
     <link rel="stylesheet" href="estilojuego.css">
</head>
<body>
    <header>
        <section class="logo">
            <img src="imagenes/dimopart.png" alt="logo" class="img-logo">
            <h2>DimoPart</h2>
        </section>
    </header>
 <aside class="menu">
    
            <nav>
            <div class="menu">
    <ul>
        <li><a href="celular.php">
            <img src="imagenes/telefono.png" alt="Teléfono" class="icon-img">
           <b> TELÉFONO</b> 
        </a></li>
        <li><a href="laptop.php">
            <img src="imagenes/laptop.png" alt="Laptop" class="icon-img">
           <b>LAPTOP</b> 
        </a></li>
        <li><a href="tablet.php">
            <img src="imagenes/tablet.png" alt="Tablet" class="icon-img">
               <b>TABLET</b> 
        </a></li>

        <li><a href="practica.php">
            <img src="imagenes/practica.png" alt="Practica" class="icon-img">
              <b>PRÁCTICA</b> 
        </a></li>

         <li><a href="cerrarsesion.php">
            <img src="imagenes/cerrar.png" alt="Cerrar sesión" class="icon-img">
            <b>CERRAR SESIÓN</b> 
        </a></li>
         


    </ul>
</div>
        </nav>
    </aside>


    <main class="contenido">
 <br><br><br><br><br>
<center>

       
  <div id="game-container">
    <div id="question">Cargando pregunta...</div>
    <div id="options"></div>
    <div id="score">Puntuación: 0</div>
    <button id="restart-button">Reiniciar</button>
    <button id="exit-button">Salir</button>
  </div>
  <script src="practica.js"></script>

</center>
</main>




 <footer class="pie">
    <p>© 2025 DimoPart Todos los Derechos Reservados</p>
    <div class="pie-derecha">
        <span><h2>DimoPart</h2></span>
        <img src="imagenes/dimopart.png" alt="logo" class="img-logo">
    </div>
</footer>
