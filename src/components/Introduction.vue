<template>
  <section id="introduction">
    <div class="container-fluid introduction-container">
      <div class="row justify-content-md-left align-items-xl-center">
        <div class="col-xl-7 introduction-carousel p-0">
          <div id="carouselIntroduction" class="carousel slide shape-mask">
            <!--data-bs-ride="carousel" -->
            <div class="carousel-inner">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                  class="active carousel-btn" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                  class="carousel-btn" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                  class="carousel-btn" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-item active">
                <img src="../imgs/introduction-imgs/4_crop.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../imgs/introduction-imgs/9_crop.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../imgs/introduction-imgs/10_crop.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-5 offset-xxl-1 col-xxl-3 introduction-text p-xl-4 p-5">
          <!-- text to update? -->
          <h1 class="mb-xxl-3 mb-xl-2">
            Zakázková výroba schodišť a zábradlí
          </h1>
          <!-- text to update -->
          <p class="lead mb-xl-3">
            Specializujeme se na <strong>nerez, hliník a sklo</strong>. Precizní řemeslné zpracování a individuální
            přístup jsou pro nás
            samozřejmostí.
          </p>
          <form action="#contact-form">
            <button class="btn btn-primary btn-lg btn-contact-form" type="submit">Začněme vaši realizaci!</button>
          </form>
          <!-- <a href="#" class="btn btn-primary btn-lg btn-request-quote">Začněme vaši realizaci!</a> -->
        </div>
      </div>
    </div>
  </section>
</template>