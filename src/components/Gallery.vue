<template>
  <section id="gallery" class="pt-5 pb-5 mb-5">
    <h1 class="p-3 text-center">Galerie</h1>
    <div class="container text-center galerry-container ">
      <div class="row gallery-tabs align-items-center">
        <div class="col p-0 mt-3">
          <ul class="nav nav-tabs justify-content-md-center ps-4 ps-md-0">
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
          <div v-for="(img, index) in getGalleryImgs()" :key="img.id + this.category" class="col">
            <div :class="{ 'show-more-container': isGalleryOpened === false }">
              <img @click="showLightbox(index)" :src="img.src" class="img-fluid"
                :class="{ 'show-more-img': index === 8 && isGalleryOpened === false }" alt="galerry img of rail">
              <div v-if="index === 8" class="centered show-more-text" :class="{ 'hidden': isGalleryOpened === true }">
                <button @click="isGalleryOpened = true" class="btn btn-primary btn-show-more" type="submit">Zobrazit
                  více</button>
              </div>
            </div>
          </div>
        </div>
        <div :class="{ 'hidden': isGalleryOpened === false }"
          class="sticky-bottom show-less-container align-items-start">
          <a href="#gallery" @click="isGalleryOpened = false"
            class="btn btn-primary btn-md btn-show-less sticky-bottom mb-3 mt-3 z-3" type="submit">
            <i class="fa-solid fa-angle-up icon-show-less"></i> Sbalit <i
              class="fa-solid fa-angle-up icon-show-less"></i>
          </a>
        </div>
      </div>
    </div>
  </section>
  <vue-easy-lightbox :visible="visible" :imgs="getGalleryImgs().map(img => img.src)" :index="currentImgIndex"
    @hide="visible = false" :zoomDisabled="true" :rotateDisabled="true" :moveDisabled="true" />
</template>

<script>
import { useTemplateRef } from 'vue';
import gallery_JSON from '../objects/gallery.json'
import VueEasyLightbox from 'vue-easy-lightbox'

export default {
  components: {
    VueEasyLightbox
  },
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
      categoryTypeOther: 'other',
      visible: false,
      currentImgIndex: 0,
    }
  },
  methods: {
    // Get imgs to show in gallery based on different conditions
    getGalleryImgs() {
      let resolvedGallery = this.galleryJson.map(item => ({
        ...item,
        src: new URL(`../imgs/galery-imgs/big/${item.id + '.jpg'}`, import.meta.url).href
      }))
      // Filter gallery by category
      let resolvedGalleryFilteredByCategory = resolvedGallery.filter((img) => img.category.includes(this.category))
      // Handle different conditions
      if (this.category === 'all') {
        if (this.isGalleryOpened === false) {
          return resolvedGallery.slice(0, 9);
        } else {
          return resolvedGallery;
        }
      } else {
        if (this.isGalleryOpened === false) {
          return resolvedGalleryFilteredByCategory.slice(0, 9);
        } else {
          return resolvedGalleryFilteredByCategory;
        }
      }
    },
    // Set current category displayed in gallery
    setCategory(category) {
      this.category = category;
      this.isGalleryOpened = false;
    },
    showLightbox(index) {
      this.currentImgIndex = index;
      this.visible = true;
    }
  }
}
</script>
