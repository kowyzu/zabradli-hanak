<template>
  <svg width="0" height="0">
    <defs>
      <clipPath id="rounded-u-shape" clipPathUnits="objectBoundingBox">
        <path d="M0,0 H1 V0.75 C0.85,1 0.15,1 0,0.75 Z" />
      </clipPath>
    </defs>
  </svg>

  <svg width="0" height="0">
    <defs>
      <clipPath id="u-curve" clipPathUnits="objectBoundingBox">
        <path d="
        M0,1 
        C0.05,0.6 0.2,0.3 0.45,0.15 
        C0.7,0.03 0.85,0.01 1,0 
        L1,0 
        L1,1 
        Z
      " />
      </clipPath>
    </defs>
  </svg>

  <svg width="0" height="0">
    <defs>
      <clipPath id="u-curve-reversed" clipPathUnits="objectBoundingBox">
        <path d="
        M0,0
        C0.05,0.4 0.2,0.7 0.45,0.85
        C0.7,0.97 0.85,0.99 1,1
        L1,0
        Z
      " />
      </clipPath>
    </defs>
  </svg>

  <svg width="0" height="0">
    <defs>
      <clipPath id="u-curve-vertical-flip" clipPathUnits="objectBoundingBox">
        <path d="
        M0,1
        C0.05,0.6 0.2,0.3 0.45,0.15
        C0.7,0.03 0.85,0.01 1,0
        L1,1
        Z
      " />
      </clipPath>
    </defs>
  </svg>
  <svg width="0" height="0">
    <defs>
      <clipPath id="u-curve-horizontal-flip" clipPathUnits="objectBoundingBox">
        <path d="
        M1,0
        C0.95,0.4 0.8,0.7 0.55,0.85
        C0.3,0.97 0.15,0.99 0,1
        L0,0
        Z
      " />
      </clipPath>
    </defs>
  </svg>




  <section id="introduction">
    <div class="container-fluid introduction-container">
      <div class="row justify-content-md-left align-items-xl-center p-0">
        <div class="col-xl-7 introduction-carousel p-0">
          <div id="carouselIntroduction" class="carousel slide mask-skew-first u-shape-mask">
            <!--data-bs-ride="carousel" -->
            <div class="mask-skew-second">
              <div class="mask-skew-third">
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
          </div>
        </div>

        <div class="col-xl-5 offset-xxl-1 col-xxl-3 introduction-text">
          <!-- text to update? -->
          <h1 class="mb-xxl-3 mb-xl-2">
            Zakázková výroba schodišť a zábradlí
          </h1>
          <!-- text to update -->
          <p class="lead mb-xl-3">
            Specializujeme se na nerez, hliník a sklo. Precizní řemeslné zpracování a individuální přístup jsou pro nás
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