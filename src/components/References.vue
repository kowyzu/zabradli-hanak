<template>
  <section id="references" class="px-md-5 px-2 py-5 text-center">
    <h1 class="p-4">Vybrané reference</h1>
    <div class="container text-center">
      <div class="row row-cols-1">
        <div class="col-md-2 col-2">
          <div class="row p-3 mb-3 tab" :class="{ 'active-tab': this.firstTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button @click="handleTabClicked('first')" class="nav-link" :class="firstTabStatus" type="button"
                aria-expanded="false" aria-controls="collapseReferenceFirst">
                <span class="h3">1</span>
              </button>
            </nav>
          </div>
          <div class="row p-3 mb-3 tab" :class="{ 'active-tab': this.secondTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button @click="handleTabClicked('second')" class="nav-link" :class="secondTabStatus" type=" button"
                aria-expanded="false" aria-controls="#collapseReferenceSecond"><span class="h3">2</span></button>
            </nav>
          </div>
          <div class="row p-3 tab" :class="{ 'active-tab': this.thirdTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button @click="handleTabClicked('third')" class="nav-link" :class="thirdTabStatus" type=" button"
                aria-expanded="false" aria-controls="#collapseReferenceThird"><span class="h3">3</span></button>
            </nav>
          </div>
        </div>
        <div class="col-md-10 col-10 reference-detail px-5 py-2 pb-4">
          <div class="row text-start ">
            <div class="collapse show " id="collapseReferenceFirst" ref="collapseFirst">
              <h2 class="pt-3">Rodinný dům – interiérové schodišťové zábradlí</h2>
              <hr class="references-underline">
              <p class="lead">V rodinném domě jsme realizovali nerezové zábradlí s vodorovnou výplní na schodišti ve
                dvou podlažích. Moderní řešení ladící s interiérem, kotvené přímo do stěny bez viditelných spojů.</p>
              <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3">
                <div v-for="(img, index) in firstGalleryJson" :key="img.id" class="col">
                  <img @click="showLightbox(index, 'first')" :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'"
                    class="img-fluid" alt="galerry img of rail">
                </div>
              </div>
            </div>
          </div>
          <div class="row text-start">
            <div class="collapse" id="collapseReferenceSecond" ref="collapseSecond">
              <h2 class="pt-3">Rodinný dům – zábradlí na balkon a schodiště</h2>
              <hr class="references-underline">
              <p class="lead">U rodinného domu jsme instalovali nerezové zábradlí na balkon a venkovní schodiště.
                Jednoduché a elegantní řešení s vodorovnou výplní ladí s fasádou a celkovým stylem domu.</p>
              <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3">
                <div v-for="(img, index) in secondGalleryJson" :key="img.id" class="col">
                  <img @click="showLightbox(index, 'second')" :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'"
                    class="img-fluid" alt="galerry img of rail">
                </div>
              </div>
            </div>
          </div>
          <div class="row text-start">
            <div class="collapse" id="collapseReferenceThird" ref="collapseThird">
              <h2 class="pt-3">Mateřská škola Tasov – zábradlí u vstupu a rampy</h2>
              <hr class="references-underline">
              <p class="lead">U mateřské školy v Tasově jsme realizovali venkovní nerezové zábradlí u vstupní rampy.
                Zábradlí je navrženo s důrazem na bezpečnost a jednoduchost, aby ladilo s barevnou fasádou a plnilo svou
                funkci v každodenním provozu školy.</p>
              <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3">
                <div v-for="(img, index) in thirdGalleryJson" :key="img.id" class="col">
                  <img @click="showLightbox(index, 'third')" :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'"
                    class="img-fluid" alt="galerry img of rail">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <vue-easy-lightbox :visible="visible"
    :imgs="getGalleryJson().map(img => '../imgs/galery-imgs/big/' + img.id + '.jpg')" :index="currentImgIndex"
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
      currentGallery: null,
    }
  },
  created() {
    console.log(this.thirdGalleryJson);
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
      this.activateTab(clickedTab)
    },
    showLightbox(index, galleryKey) {
      this.currentImgIndex = index;
      this.currentGallery = galleryKey;
      this.visible = true;
    },
    getGalleryJson() {
      if (this.currentGallery === 'second') {
        return this.secondGalleryJson
      } else if (this.currentGallery === 'third') {
        return this.thirdGalleryJson
      } return this.firstGalleryJson
    }
  }
}
</script>