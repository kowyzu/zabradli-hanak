<template>
  <section id="gallery" class="pt-5">
    <div class="container text-center galerry-container ">
      <div class="row gallery-tabs align-items-center">
        <div class="col text-center p-0 mt-3">
          <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
              <button @click="setCategory(this.categoryTypeAll)" class="nav-link"
                :class="{ 'active': this.category === this.categoryTypeAll }" type="submit">Vše</button>
            </li>
            <li class="nav-item">
              <button @click="setCategory(this.categoryTypeInterior)" class="nav-link"
                :class="{ 'active': this.category === this.categoryTypeInterior }" type="submit">Interiérové
                zábradlí</button>
            </li>
            <li class="nav-item">
              <button @click="setCategory(this.categoryTypeStaircaseRail)" class="nav-link"
                :class="{ 'active': this.category === this.categoryTypeStaircaseRail }" type="submit">Schodišťové
                zábradlí</button>
            </li>
            <li class="nav-item">
              <button @click="setCategory(this.categoryTypeExterior)" class="nav-link"
                :class="{ 'active': this.category === this.categoryTypeExterior }" type="submit">Venkovní
                zábradlí</button>
            </li>
            <li class="nav-item">
              <button @click="setCategory(this.categoryTypeFrenchWindows)" class="nav-link"
                :class="{ 'active': this.category === this.categoryTypeFrenchWindows }" type="submit">Zábradlí před
                francouzská okna</button>
            </li>
            <li class="nav-item">
              <button @click="setCategory(this.categoryTypeOther)" class="nav-link"
                :class="{ 'active': this.category === this.categoryTypeOther }" type="submit">Ostatní</button>
              <!-- <a class="nav-link" href="#">Ostatní</a> -->
            </li>
          </ul>
        </div>
      </div>


      <div>
        <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3 mt-1 mb-2">
          <div v-for="(img, index) in getGalleryImgs()" :key="img.id + this.category"
            :class="['col', { hidden: index > 8 && isGalleryOpened === false }]">
            <div :class="{ 'show-more-container': isGalleryOpened === false }">
              <img :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'" class="img-fluid"
                :class="{ 'show-more-img': index === 8 && isGalleryOpened === false }" alt="galerry img of rail">
              <div v-if="index === 8" class="centered show-more-text" :class="{ 'hidden': isGalleryOpened === true }">
                <button @click="isGalleryOpened = true" class="btn btn-primary btn-lg btn-show-more"
                  type="submit">Zobrazit více</button>
              </div>
            </div>
          </div>
        </div>
        <div :class="{ 'hidden': isGalleryOpened === false }"
          class="sticky-bottom show-less-container align-items-start">
          <button @click="isGalleryOpened = false"
            class="btn btn-primary btn-md btn-show-less sticky-bottom mb-3 mt-3 z-3"
            :class="{ 'hidden': isGalleryOpened === false }" type="submit">
            <i class="fa-solid fa-angle-up"></i> Sbalit <i class="fa-solid fa-angle-up"></i>
          </button>
        </div>
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
      galleryJson: gallery_JSON,
      category: 'all',
      isGalleryOpened: false,
      categoryTypeAll: 'all',
      categoryTypeInterior: 'interior',
      categoryTypeStaircaseRail: 'staircase-rail',
      categoryTypeExterior: 'exterior',
      categoryTypeFrenchWindows: 'french-windows',
      categoryTypeOther: 'other'
    }
  },
  methods: {
    getGalleryImgs() {
      if (this.category === 'all') {
        return this.galleryJson;
      }
      console.log(this.galleryJson);
      return this.galleryJson.filter((img) => img.category.includes(this.category));

    },
    setCategory(category) {
      this.category = category;
      this.isGalleryOpened = false;
    }
  }
}


</script>
