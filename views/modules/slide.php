<style type="text/css">
  .imgnormalizada img {
  width: 100%;
  height: 500px;
  max-height: 500px;
}
@media all and (min-width: 500px) and (max-width: 1000px)
{
  .imgnormalizada img {
  width: 100%;
  height: 280px;
  max-height: 280px;
}
}
</style>
<div id="top1">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php
      $mostrarArticulos = new slideController();
      $mostrarArticulos->listaDeSlide();
       ?>
       <!--
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      -->
    </ol>

    <div class="carousel-inner">
      <?php
      $mostrarArticulos->selectImagenesSlideController();
      ?>
      <!--
      <div class="carousel-item active imgnormalizada">
        <img src="../views/images/slide/slide306.jpg" class="d-block w-100" alt="pexels">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item imgnormalizada">
        <img src="../views/images/slide/artem.jpg" class="d-block w-100" alt="pexels">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item imgnormalizada">
        <img src="../views/images/slide/ksenia.jpg" class="d-block w-100" alt="fomr pexels">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    -->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div id="botSlide"></div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#me").click(function(){
      alert("jquery si esta funcionando");
    });
  });
</script>