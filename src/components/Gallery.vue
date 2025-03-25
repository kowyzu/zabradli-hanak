<template>
  <section id="gallery" class="pt-3 mt-3">
    <div class="container text-center galerry-container ">
      <div class="row gallery-tabs align-items-center">
        <div class="col p-0">
          <h3 class="mt-2">Ukázky naší práce</h3>
        </div>
      </div>

      <div class="row gallery-tabs align-items-center">
        <div class="col text-center p-0 mt-3">
          <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" href="#">Vše</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Interiérové zábradlí</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Schodišťové zábradlí</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Venkovní zábradlí</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Zábradlí před francouzská okna</a>
            </li>
          </ul>
        </div>
      </div>

      <div id="galerry-all" class="row row-cols-md-3 row-cols-1 gy-3 gx-3 mt-1 mb-2">
        <!-- <div v-for="item in items" class="col">
                    {{ item.message }}
                </div> -->

        <template v-for="img in galleryJson" :key="img.id">
          <div class="col" v-if="img.hidden === false">
            <img :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'" class="img-fluid" alt="galerry img of rail">
          </div>
        </template>

        <div class="col">
          <div class="show-more-container">
            <img src="../imgs/galery-imgs/big/131.jpg" class="img-fluid show-more-img" alt="galerry img of rail">
            <div class="centered show-more-text">
              <button class="btn btn-primary btn-lg btn-show-more" type="submit">Zobrazit více {{ concat(name,
                zkouskasirem) }}</button>
            </div>
          </div>
        </div>

        <template v-for="img in galleryJson" :key="img.id">
          <div class="col hidden" v-if="img.hidden === true">
            <img :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'" class="img-fluid" alt="galerry img of rail">
          </div>
        </template>



        <!-- <div class="col">
          <img src="../imgs/galery-imgs/big/147.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col">
          <img src="../imgs/galery-imgs/big/103.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col">
          <img src="../imgs/galery-imgs/big/117.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col">
          <img src="../imgs/galery-imgs/big/146.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col">
          <img src="../imgs/galery-imgs/big/124.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col">
          <img src="../imgs/galery-imgs/big/151.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col">
          <img src="../imgs/galery-imgs/big/137.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col">
          <img src="../imgs/galery-imgs/big/149.jpg" class="img-fluid" alt="galerry img of rail">
        </div> -->



        <!-- <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/130.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/94.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/105.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/115.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/154.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/150.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/134.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/141.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/98.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/125.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/95.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/102.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/111.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/96.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/97.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/99.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/100.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/104.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/106.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/113.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/114.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/118.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/119.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/120.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/121.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/122.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/123.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/126.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/127.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/128.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/129.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/133.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/139.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/142.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/152.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/153.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/110.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/116.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/132.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/135.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/140.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/144.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/145.jpg" class="img-fluid" alt="galerry img of rail">
        </div>
        <div class="col more-img hidden">
          <img src="../imgs/galery-imgs/big/148.jpg" class="img-fluid" alt="galerry img of rail">
        </div> -->
      </div>
    </div>
    <!-- <button class="btn btn-primary btn-lg btn-show-less sticky-bottom mb-2 z-3 hidden" type="submit">
      Zobrazit méně
    </button> -->
  </section>
</template>

<script>
import gallery_JSON from '../objects/gallery.json'
export default {
  data() {
    return {
      name: "overuji",
      zkouskasirem: "jej",
      galleryJson: gallery_JSON,
    }
  },
  methods: {
    concat(name, zkouskasirem) {
      return (name + zkouskasirem)
    }
  }
}

console.log(gallery_JSON);

</script>
