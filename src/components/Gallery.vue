<template>
  <section id="gallery" class="pt-3 mt-3">
    <div class="container text-center galerry-container ">
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

      <div v-if="galleryJson.length < 8">
        <div id="galerry-all" class="row row-cols-md-3 row-cols-1 gy-3 gx-3 mt-1 mb-2">
          <div v-for="img in galleryJson" :key="img.id" class="col">
            {{ console.log(img.id) }}
            <img :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'" class="img-fluid" alt="galerry img of rail">
          </div>
        </div>
      </div>

      <div v-if="galleryJson.length > 8">
        <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3 mt-1 mb-2">
          <div v-for="img in galleryJson" :key="img.id" class="col">
            {{ console.log(img.id) }}
            <img :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'" class="img-fluid" alt="galerry img of rail">
          </div>
        </div>
      </div>

      <!-- <div v-if="galleryJson.length > 8" class="col">
          <div class="show-more-container">
            <img :src="'../imgs/galery-imgs/big/' + galleryJson[8].id + '.jpg'" class="img-fluid"
              alt="gallery img of rail">
            <div class="centered show-more-text">
              <button class="btn btn-primary btn-lg btn-show-more" type="submit">Zobrazit více</button>
            </div>
          </div>
        </div> -->


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
