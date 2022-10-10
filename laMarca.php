<?php
include 'cabecera.php';
?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/tiendaDeRopa.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>ONBOU</h1>
        <p>ONBOU NACE EN 2020 DURANTE LA PANDEMIA. SE PRESENTA COMO UN PUNTO DE REFERENCIA PARA LA MODA DIRIGIDA A ESTE PUBLICO CADA VEZ MAS EXIGENTE, AUN ES UNA EMPRESA CHICA PERO QUE CADA DIA CRECE MAS.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/casual.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>
          <font color="#000000">NUESTRO PUBLICO</font>
        </h1>
        <p>
          <font color="#000000">EL PUBLICO DE ONBOU SE CARACTERIZA POR SER JOVENES ATREVIDOS, CONOCEDORES DE LAS ULTIMAS TENDENCIAS E INTERESADOS EN LA MUSICA, LAS REDES SOCIALES Y LAS NUEVAS TECNOLOGIAS.</font>
        </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/pieles.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>POLITICA DE TRATO A LOS ANIMALES</h5>
        <p>TODOS LOS PRODUCTOS DE ORIGEN ANIMAL, INCLUIDAS PIELES Y CUEROS, COMERCIALIZADOS EN NUESTRAS TIENDAS PROCEDEN EXCLUSIVAMENTE DE ANIMALES CRIADOS EN GRANJAS PARA LA ALIMENTACION Y EN NINGUN CASO, DE ANIMALES SACRIFICADOS EXCLUSIVAMENTE PARA LA VENTA DE SUS PIELES.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php 
include 'pie.php';
?>