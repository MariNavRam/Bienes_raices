<!DOCTYPE html>
<html lang="en">



<body>

    <main class="seccion contenedor">
        <h1 style="color:blue;" class="fw-300 centrar-texto">{{$casa->nombre}}</h1>
        <div class="contenedor-anuncios">
            <div class="anuncio">
                <img src="{{ URL::asset('assents/img/' . $casa->imagen) }}" alt="Anuncio casa en el lago">
                <div class="contenido-anuncio">

                    <h2 style="color:darkslateblue;">{{$casa->descripcion}}</h2>
                    <h2 style="color:green" class="precio">${{$casa->precio}}</h2>

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



                </div>
            </div>
        </div>
    </main>


</body>

</html>
