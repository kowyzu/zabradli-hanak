<template>
  <section id="references" class="px-lg-5 px-lg-2 py-sm-5 pt-5 text-center">
    <h1 class="p-4">Vybrané reference</h1>
    <div class="container text-center">
      <div class="row row-cols-1 justify-content-center">
        <!-- on small displays tabs at the top -->
        <div class="row d-lg-none p-0">
          <div @click="handleTabClicked('third')" class="col tab py-3 d-flex align-items-center justify-content-center"
            :class="{ 'active-tab': this.thirdTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button class="nav-link p-0" :class="thirdTabStatus" type=" button" aria-expanded="false"
                aria-controls="#collapseReferenceThird">
                <span class="h5 d-none d-sm-block">Rodinný dům – exteriér</span>
                <span class="h5 d-block d-sm-none">Exteriér</span>
              </button>
            </nav>
          </div>
          <div @click="handleTabClicked('second')"
            class="col me-1 ms-1 me-sm-2 ms-sm-2 tab py-3 d-flex align-items-center justify-content-center"
            :class="{ 'active-tab': this.secondTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button class="nav-link p-0" :class="secondTabStatus" type=" button" aria-expanded="false"
                aria-controls="#collapseReferenceSecond">
                <span class="h5 d-none d-sm-block">Ocelový nápis</span>
                <span class="h5 d-block d-sm-none">Nápis</span>
              </button>
            </nav>
          </div>
          <div @click="handleTabClicked('first')" class="col tab py-3 d-flex align-items-center justify-content-center"
            :class="{ 'active-tab': this.firstTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button class="nav-link p-0" :class="firstTabStatus" type="button" aria-expanded="false"
                aria-controls="collapseReferenceFirst">
                <span class="h5 d-none d-sm-block">Rodinný dům – interiér</span>
                <span class="h5 d-block d-sm-none">Interiér</span>
              </button>
            </nav>
          </div>
        </div>
        <!-- on md and bigger displays tabs on the left-->
        <div class="col-md-2 col-2 d-none d-lg-block">
          <div class="row mb-3 tab" :class="{ 'active-tab': this.thirdTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button @click="handleTabClicked('third')" class="nav-link p-0 p-md-3" :class="thirdTabStatus"
                type=" button" aria-expanded="false" aria-controls="#collapseReferenceThird"><span class="h5">Rodinný
                  dům –
                  exteriér</span></button>
            </nav>
          </div>
          <div class="row mb-3 tab" :class="{ 'active-tab': this.secondTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button @click="handleTabClicked('second')" class="nav-link p-0 p-md-3" :class="secondTabStatus"
                type=" button" aria-expanded="false" aria-controls="#collapseReferenceSecond"><span class="h5">Ocelový
                  nápis</span></button>
            </nav>
          </div>
          <div class="row tab" :class="{ 'active-tab': this.firstTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button @click="handleTabClicked('first')" class="nav-link p-0 p-md-3" :class="firstTabStatus"
                type="button" aria-expanded="false" aria-controls="collapseReferenceFirst">
                <span class="h5">Rodinný dům – interiér</span>
              </button>
            </nav>
          </div>
        </div>

        <!-- References details: header, detail and pictures -->
        <div class="col-lg-10 reference-detail px-sm-5 pt-5 pt-lg-3 pb-5 mb-sm-5">
          <div class="row text-start">
            <div class="collapse show" id="collapseReferenceThird" ref="collapseThird">
              <h3 class="py-3">Rodinný dům – oplocení s hliníkovou výplní</h3>
              <hr class="references-underline">
              <p class="pb-2">Pro rodinný dům ve městě jsme vyrobili a namontovali moderní plot s hliníkovou lamelovou
                výplní v hnědé barvě. Součástí byla dvoukřídlá brána pro vjezd, branka pro pěší a boční části plotu,
                které jsme umístili mezi betonové sloupky s kamenným obkladem. Výsledek působí elegantně a zároveň
                poskytuje dostatek soukromí.</p>
              <div id="galerry-preview" class="row row-cols-xl-3 row-cols-md-2 row-cols-1 gy-3 gx-3">
                <div v-for="(img, index) in getGalleryJson()" :key="img.id" class="col">
                  <img @click="showLightbox(index)" :src="img.src" class="img-fluid" alt="galerry img of rail">
                </div>
              </div>
            </div>
          </div>
          <div class="row text-start">
            <div class="collapse" id="collapseReferenceSecond" ref="collapseSecond">
              <h3 class="py-3">Veselí nad Moravou – ocelový nápis na nábřeží</h3>
              <hr class="references-underline">
              <p class="pb-2">Na břehu Baťova kanálu ve Veselí nad Moravou jsme realizovali prostorový nápis z lakované
                oceli. Masivní písmo v moderním designu je ukotveno na betonovém základu a slouží jako
                výrazný orientační a vizuální prvek. </p>
              <div id="galerry-preview" class="row row-cols-xl-3 row-cols-md-2 row-cols-1 gy-3 gx-3">
                <div v-for="(img, index) in getGalleryJson()" :key="img.id" class="col">
                  <img @click="showLightbox(index)" :src="img.src" class="img-fluid" alt="galerry img of rail">
                </div>
              </div>
            </div>
          </div>
          <div class="row text-start ">
            <div class="collapse" id="collapseReferenceFirst" ref="collapseFirst">
              <h3 class="py-3">Rodinný dům – interiérové schodišťové zábradlí</h3>
              <hr class="references-underline">
              <p class="pb-2">V podkroví rodinného domu jsme vyrobili a instalovali nerezové zábradlí s výplní z
                mléčného skla.
                Systém sloupků s kotvením do podlahy a madlem po celé délce zajišťuje bezpečnost i elegantní vzhled.
                Výplně z matného skla dodávají prostoru soukromí a ladí s moderním interiérem.</p>
              <div id="galerry-preview" class="row row-cols-xl-3 row-cols-md-2 row-cols-1 gy-3 gx-3 pb-3">
                <div v-for="(img, index) in getGalleryJson()" :key="img.id" class="col">
                  <img @click="showLightbox(index)" :src="img.src" class="img-fluid" alt="galerry img of rail">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <vue-easy-lightbox :visible="visible" :imgs="getGalleryJson().map(img => img.src)" :index="currentImgIndex"
    @hide="visible = false" :zoomDisabled="true" :rotateDisabled="true" :moveDisabled="true" />
</template>

<script>
import { useTemplateRef } from 'vue';
import * as bootstrap from "bootstrap";
import first_rererence_JSON from '../objects/first-reference-gallery.json';
import second_rererence_JSON from '../objects/second-reference-gallery.json';
import third_rererence_JSON from '../objects/third-reference-gallery.json';
import VueEasyLightbox from 'vue-easy-lightbox'



export default {
  components: {
    VueEasyLightbox
  },
  data() {
    return {
      firstGalleryJson: first_rererence_JSON,
      secondGalleryJson: second_rererence_JSON,
      thirdGalleryJson: third_rererence_JSON,
      firstTabStatus: 'non-active',
      secondTabStatus: 'non-active',
      thirdTabStatus: 'active',
      visible: false,
      currentImgIndex: 0,
      currentGallery: 'third',
    }
  },
  methods: {
    // Show or hide defined elements
    collapseElement(elementToShow, elementsToHide) {
      const bsCollapse = new bootstrap.Collapse(elementToShow, {
        toggle: false // Prevent auto toggle on init
      });

      elementsToHide.forEach(elementToHide => {
        const bsCollapseHide = new bootstrap.Collapse(elementToHide, {
          toggle: false // Prevent auto toggle on init
        });
        bsCollapseHide.hide();
      });

      bsCollapse.show();
    },

    // Set status of clicked tab to active
    activateTab(clickedTab) {
      this.firstTabStatus = 'non-active';
      this.secondTabStatus = 'non-active';
      this.thirdTabStatus = 'non-active';
      if (clickedTab === 'second') {
        this.secondTabStatus = 'active';
      } else if (clickedTab === 'first') {
        this.firstTabStatus = 'active';
      } else {
        this.thirdTabStatus = 'active';
      }
    },

    // After click on tab activate the tab
    handleTabClicked(clickedTab) {
      if (clickedTab === 'first') {
        this.collapseElement(this.$refs.collapseFirst, [this.$refs.collapseSecond, this.$refs.collapseThird])
      } else if (clickedTab === 'second') {
        this.collapseElement(this.$refs.collapseSecond, [this.$refs.collapseFirst, this.$refs.collapseThird])
      } else if (clickedTab === 'third') {
        this.collapseElement(this.$refs.collapseThird, [this.$refs.collapseFirst, this.$refs.collapseSecond])
      }
      this.currentGallery = clickedTab
      this.activateTab(clickedTab)
    },

    // Use vue-easy-lightbox
    showLightbox(index) {
      this.currentImgIndex = index;
      this.visible = true;
    },

    // Import imgs from json and display only relevant imgs according to currentGallery
    getGalleryJson() {
      let firstResolvedGallery = this.firstGalleryJson.map(item => ({
        ...item,
        src: new URL(`../imgs/galery-imgs/${item.id + '.webp'}`, import.meta.url).href
      }))
      let secondResolvedGallery = this.secondGalleryJson.map(item => ({
        ...item,
        src: new URL(`../imgs/galery-imgs/${item.id + '.webp'}`, import.meta.url).href
      }))
      let thirdResolvedGallery = this.thirdGalleryJson.map(item => ({
        ...item,
        src: new URL(`../imgs/galery-imgs/${item.id + '.webp'}`, import.meta.url).href
      }))
      if (this.currentGallery === 'second') {
        return secondResolvedGallery
      }

      if (this.currentGallery === 'third') {
        return thirdResolvedGallery
      }

      return firstResolvedGallery
    }
  }
}
</script>