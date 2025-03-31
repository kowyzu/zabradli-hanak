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
            <li class="nav-item">
              <a class="nav-link" href="#">Ostatní</a>
            </li>
          </ul>
        </div>
      </div>


      <div>
        <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3 mt-1 mb-2">
          <div v-for="(img, index) in galleryJson" :key="img.id"
            :class="['col', { hidden: index > 8 && galleryAction === 'hide' }]">
            <div :class="{ 'show-more-container': galleryAction === 'hide' }">
              <img :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'" class="img-fluid"
                :class="{ 'show-more-img': index === 8 && galleryAction === 'hide' }" alt="galerry img of rail">
              <div v-if="index === 8" class="centered show-more-text">
                <button @click="displayOrHideGallery('display')" class="btn btn-primary btn-lg btn-show-more"
                  type="submit">Zobrazit více</button>
              </div>
            </div>
          </div>
        </div>
        <button @click="displayOrHideGallery('hide')"
          class="btn btn-primary btn-lg btn-show-less sticky-bottom mb-2 z-3" :class="galleryAction" type="submit">
          Zobrazit méně
        </button>
      </div>
    </div>
  </section>
</template>

<script>
import { useTemplateRef } from 'vue';
import gallery_JSON from '../objects/gallery.json'
export default {
  data() {
    return {
      name: "overuji",
      zkouskasirem: "jej",
      galleryJson: gallery_JSON,
      galleryAction: "hide",
    }
  },
  methods: {
    displayOrHideGallery(action) {
      if (action === "hide") {
        this.galleryAction = "hide"
        return this.galleryAction
      }
      this.galleryAction = "display"
      return this.galleryAction
    },
    getGalleryArray() {

    }
  }
}


</script>
