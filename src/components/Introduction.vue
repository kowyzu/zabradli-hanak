<script setup>
import firstImg from '../imgs/introduction-imgs/first.jpeg'
import secondImg from '../imgs/introduction-imgs/second.jpeg'
import thirdImg from '../imgs/introduction-imgs/third.jpeg'
</script>

<template>
  <section id="introduction">
    <div class="container-fluid introduction-container">
      <div class="row justify-content-md-left align-items-xl-center">
        <div class="col-xl-7 introduction-carousel p-0">
          <div id="carouselIntroduction" class="carousel slide shape-mask carousel-fade">
            <!--data-bs-ride="carousel" -->
            <div class="carousel-inner">
              <div class="carousel-indicators justify-content-start ms-3 mb-3">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                  class="active carousel-btn carousel-btn-circle" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                  class="carousel-btn carousel-btn-circle" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                  class="carousel-btn carousel-btn-circle" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-item active">
                <img :src="firstImg" class="d-block w-100" alt="img of rail">
              </div>
              <div class="carousel-item">
                <img :src="secondImg" class="d-block w-100" alt="img of rail">
              </div>
              <div class="carousel-item">
                <img :src="thirdImg" class="d-block w-100" alt="img of rail">
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
          <p class="mb-xl-3">
            Specializujeme se na <strong>nerez, hliník a sklo</strong>. Precizní řemeslné zpracování a individuální
            přístup jsou pro nás
            samozřejmostí.
          </p>
          <form action="#footer">
            <button class="btn btn-primary btn-lg btn-contact-form" type="submit">Začněme vaši realizaci!</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
