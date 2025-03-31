<template>
  <section id="gallery" class="pt-3 mt-3">
    <div class="container text-center galerry-container ">
      <div class="row gallery-tabs align-items-center">
        <div class="col text-center p-0 mt-3">
          <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
              <button @click="filterGalleryByCategory('all')" class="nav-link" type="submit">Vše</button>
            </li>
            <li class="nav-item">
              <button @click="filterGalleryByCategory('interior')" class="nav-link" type="submit">Interiérové
                zábradlí</button>
            </li>
            <li class="nav-item">
              <button @click="filterGalleryByCategory('staircase-rail')" class="nav-link" type="submit">Schodišťové
                zábradlí</button>
            </li>
            <li class="nav-item">
              <button @click="filterGalleryByCategory('outerior')" class="nav-link" type="submit">Venkovní
                zábradlí</button>
            </li>
            <li class="nav-item">
              <button @click="filterGalleryByCategory('french-windows')" class="nav-link" type="submit">Zábradlí před
                francouzská okna</button>
            </li>
            <li class="nav-item">
              <button @click="filterGalleryByCategory('other')" class="nav-link" type="submit">Ostatní</button>
              <!-- <a class="nav-link" href="#">Ostatní</a> -->
            </li>
          </ul>
        </div>
      </div>


      <div>
        <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3 mt-1 mb-2">
          <div v-for="(img, index) in galleryJson" :key="img.id"
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
        <button @click="isGalleryOpened = false" class="btn btn-primary btn-lg btn-show-less sticky-bottom mb-2 z-3"
          :class="isGalleryOpened" type="submit">
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
      galleryJson: gallery_JSON,
      isGalleryOpened: false,
    }
  },
  methods: {
    //TODO fix - use contains!!!!!!
    filterGalleryByCategory(category) {
      if (category !== 'all') {
        this.galleryJson = this.galleryJson.filter((img) => img.category === category)
        console.log(this.galleryJson);
        return this.galleryJson
      }
      return this.galleryJson
    }
  }
}


</script>
