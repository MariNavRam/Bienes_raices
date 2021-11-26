<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienes Raices</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="../assents/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>
                <div class="mobile-menu">
                    <a href="#navegacion">
                        <img src="../assents/img/barras.svg" alt="Icono Menu">
                    </a>
                </div>

                <nav id="navegacion" class="navegacion">
                    <a href="nosotros">Nosotros</a>
                    <a href="anuncios">Anuncios</a>
                    <a href="blog">Blog</a>
                    <a href="contacto">Contacto</a>
                </nav>
            </div>
        </div> <!-- contenedor -->
    </header>

    <main class="seccion contenedor">
        <h2 class="fw-300 centrar-texto">Casas y Depas en Venta</h2>
        @foreach ( $casas as $casa )
        <div class="contenedor-anuncios">
            <div class="anuncio">
                <img src="{{ URL::asset('assents/img/' . $casa->imagen) }}" alt="Anuncio casa en el lago">
                <div class="contenido-anuncio">
                    <h3>{{$casa->nombre}}</h3>
                    <p>{{$casa->descripcion}}</p>
                    <p class="precio">${{$casa->precio}}</p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="../assents/img/icono_wc.svg" alt="icono wc">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="../assents/img/icono_estacionamiento.svg" alt="icono autos">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="../assents/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p>4</p>
                        </li>
                    </ul>


                    <a href="{{route('anuncio', ['id' => $casa->id])}}" class="boton boton-amarillo d-block">Ver Propiedad</a>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros">Nosotros</a>
                <a href="anuncios">Anuncios</a>
                <a href="blog">Blog</a>
                <a href="contacto">Contacto</a>
            </nav>
            <p class="copyright">Todos los Derechos Reservados &copy; </p>
        </div>
    </footer>
</body>

</html>
