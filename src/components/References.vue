<template>
  <section id="references" class="px-lg-5 px-lg-2 py-5 text-center">
    <h1 class="p-4">Vybrané reference</h1>
    <div class="container text-center">
      <div class="row row-cols-1 justify-content-center">
        <div class="row d-lg-none p-0">
          <div @click="handleTabClicked('first')"
            class="col me-1 tab py-3 d-flex align-items-center justify-content-center"
            :class="{ 'active-tab': this.firstTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button class="nav-link p-0" :class="firstTabStatus" type="button" aria-expanded="false"
                aria-controls="collapseReferenceFirst">
                <span class="h5 d-none d-sm-block">Rodinný dům – interiér</span>
                <span class="h5 d-block d-sm-none">Interiér</span>
              </button>
            </nav>
          </div>
          <div @click="handleTabClicked('second')"
            class="col me-1 ms-1 tab py-3 d-flex align-items-center justify-content-center"
            :class="{ 'active-tab': this.secondTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button class="nav-link p-0" :class="secondTabStatus" type=" button" aria-expanded="false"
                aria-controls="#collapseReferenceSecond">
                <span class="h5 d-none d-sm-block">Mateřská škola Tasov</span>
                <span class="h5 d-block d-sm-none">Školka</span>
              </button>
            </nav>
          </div>
          <div @click="handleTabClicked('third')"
            class="col ms-1 tab py-3 d-flex align-items-center justify-content-center"
            :class="{ 'active-tab': this.thirdTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button class="nav-link p-0" :class="thirdTabStatus" type=" button" aria-expanded="false"
                aria-controls="#collapseReferenceThird">
                <span class="h5 d-none d-sm-block">Rodinný dům – exteriér</span>
                <span class="h5 d-block d-sm-none">Exteriér</span>
              </button>
            </nav>
          </div>
        </div>
        <!-- from md -->
        <div class="col-md-2 col-2 d-none d-lg-block">
          <div class="row mb-3 tab" :class="{ 'active-tab': this.firstTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button @click="handleTabClicked('first')" class="nav-link p-0 p-md-3" :class="firstTabStatus"
                type="button" aria-expanded="false" aria-controls="collapseReferenceFirst">
                <span class="h5">Rodinný dům – interiér</span>
              </button>
            </nav>
          </div>
          <div class="row mb-3 tab" :class="{ 'active-tab': this.secondTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button @click="handleTabClicked('second')" class="nav-link p-0 p-md-3" :class="secondTabStatus"
                type=" button" aria-expanded="false" aria-controls="#collapseReferenceSecond"><span class="h5">Mateřská
                  škola
                  Tasov</span></button>
            </nav>
          </div>
          <div class="row tab" :class="{ 'active-tab': this.thirdTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button @click="handleTabClicked('third')" class="nav-link p-0 p-md-3" :class="thirdTabStatus"
                type=" button" aria-expanded="false" aria-controls="#collapseReferenceThird"><span class="h5">Rodinný
                  dům –
                  exteriér</span></button>
            </nav>
          </div>
        </div>
        <div class="col-lg-10 reference-detail px-sm-5 pt-5 pt-lg-3 pb-5">
          <div class="row text-start ">
            <div class="collapse show " id="collapseReferenceFirst" ref="collapseFirst">
              <h3 class="py-3">Rodinný dům – interiérové schodišťové zábradlí</h3>
              <hr class="references-underline">
              <p class="lead pb-2">V rodinném domě jsme realizovali nerezové zábradlí s vodorovnou výplní na schodišti
                ve
                dvou podlažích. Moderní řešení ladící s interiérem, kotvené přímo do stěny bez viditelných spojů.</p>
              <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3 pb-3">
                <div v-for="(img, index) in getGalleryJson()" :key="img.id" class="col">
                  <img @click="showLightbox(index)" :src="img.src" class="img-fluid" alt="galerry img of rail">
                </div>
              </div>
            </div>
          </div>
          <div class="row text-start">
            <div class="collapse" id="collapseReferenceSecond" ref="collapseSecond">
              <h3 class="py-3">Mateřská škola Tasov – zábradlí u vstupu a rampy</h3>
              <hr class="references-underline">
              <p class="lead pb-2">U mateřské školy v Tasově jsme realizovali venkovní nerezové zábradlí u vstupní
                rampy.
                Zábradlí je navrženo s důrazem na bezpečnost a jednoduchost, aby ladilo s barevnou fasádou a plnilo svou
                funkci v každodenním provozu školy.</p>
              <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3">
                <div v-for="(img, index) in getGalleryJson()" :key="img.id" class="col">
                  <img @click="showLightbox(index)" :src="img.src" class="img-fluid" alt="galerry img of rail">
                </div>
              </div>
            </div>
          </div>
          <div class="row text-start">
            <div class="collapse" id="collapseReferenceThird" ref="collapseThird">
              <h3 class="py-3">Rodinný dům – zábradlí na balkon a schodiště</h3>
              <hr class="references-underline">
              <p class="lead pb-2">U rodinného domu jsme instalovali nerezové zábradlí na balkon a venkovní schodiště.
                Jednoduché a elegantní řešení s vodorovnou výplní ladí s fasádou a celkovým stylem domu.</p>
              <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3">
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
      isFirstTabActive: true,
      isSecondTabActive: false,
      firstTabStatus: 'active',
      secondTabStatus: 'non-active',
      thirdTabStatus: 'non-active',
      visible: false,
      currentImgIndex: 0,
      currentGallery: 'first',
    }
  },
  methods: {
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

      bsCollapse.show(); // Or .show() to expand

    },
    activateTab(clickedTab) {
      this.firstTabStatus = 'non-active';
      this.secondTabStatus = 'non-active';
      this.thirdTabStatus = 'non-active';
      if (clickedTab === 'second') {
        this.secondTabStatus = 'active';
      } else if (clickedTab === 'third') {
        this.thirdTabStatus = 'active';
      } else {
        this.firstTabStatus = 'active';
      }
    },
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
    showLightbox(index) {
      this.currentImgIndex = index;
      this.visible = true;
    },
    getGalleryJson() {
      let firstResolvedGallery = this.firstGalleryJson.map(item => ({
        ...item,
        src: new URL(`../imgs/galery-imgs/big/${item.id + '.jpg'}`, import.meta.url).href
      }))
      let secondResolvedGallery = this.secondGalleryJson.map(item => ({
        ...item,
        src: new URL(`../imgs/galery-imgs/big/${item.id + '.jpg'}`, import.meta.url).href
      }))
      let thirdResolvedGallery = this.thirdGalleryJson.map(item => ({
        ...item,
        src: new URL(`../imgs/galery-imgs/big/${item.id + '.jpg'}`, import.meta.url).href
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