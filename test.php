<?php
include('header.php');
?>
<div class="jumbotron jumbotron-fluid jumbotron1">
    <div class="container">
        <h1 class="display-4 bordeBot">Test Coronavirus</h1>


    </div>
</div>
<div class="text-right container marginBot social-button">
    <a href="#" target="_blank"><img src="img/instagram.png" alt="instagram" width="25px" class="logosRedes"></a>
    <a href="https://www.youtube.com/channel/UC1U7M-rvlfWJ6mZcGQ33Mbw/videos" target="_blank"><img src="img/youtube.png" alt="youtube" width="25px" class="logosRedes"></a>
    <a href="https://twitter.com/opsoms" target="_blank"><img src="img/twitter.png" alt="twitter" width="25px" class="logosRedes"></a>
</div>


<div class="container borde">
    <div id="idTest" class="texto">
        <form id="test" class="test" action="">
            <h1 class="texto"><span class="bordeIzquierdaFino"></span>Pregunta 1</h1>
            <p><b>¿Tienes tos seca sin mucosidad con mucha frecuencia y además superas los 38º de fiebre que no baja al tomar paracetamol?</b></p>
            <input type="radio" name="p1" id="si1" value="si1">Si<br>
            <input type="radio" name="p1" id="no1" value="no1">No

            <h1 class="texto"><span class="bordeIzquierdaFino"></span>Pregunta 2</h1>
            <p><b>¿Has viajado a alguno de estos países o has estado cerca de alguna persona infectada con coronavirus en los últimos 14 días?</b></p>
            <p>Estos son los países con más infecciones por coronavirus:</p>
            <div class="marginIzquierda">
                <ul class="col-6">
                    <li>China (incluido Hong Kong y Macao)</li>
                    <li>Corea del Sur</li>
                    <li>Japón</li>
                    <li>Singapur</li>
                    <li>Irán</li>
                    <li>Italia (regiones de Lombardia, Véneto, Emília-Romanya, Piamonte)</li>
                </ul>
            </div>
            <p>Contacto estrecho quiere decir que se haya dado alguna de estas situaciones:</p>
            <div class="marginIzquierda">
                <ul class="col-6">
                        <li>Vivir en la misma casa o estar en la misma habitación o compartir espacio de trabajo.</li>
                        <li>Tener contacto cara a cara, como por ejemplo, una conversación de más de unos minutos.</li>
                        <li>Si ha tosido cerca de ti.</li>
                        <li>Estar a menos de 2 metros de la persona durante más de 15 minutos.</li>
                        <li>Estar en contacto con sus secreciones (mucosidad, saliva, excrementos, orina, sangre, vómitos, etc.).</li>
                    </ul>
            </div>

            <input type="radio" name="p2" id="si2" value="si2" required>Si <br>
            <input type="radio" name="p2" id="no2" value="no2">No <br><br>
        </form>
        <input type="button" id="resultado" value="MOSTRAR EL RESULTADO">
    </div>
</div>

<?php
include('footer.php');
?>