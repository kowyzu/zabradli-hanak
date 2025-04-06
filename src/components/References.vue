<template>
  <section id="references" class="p-md-5 p-2 text-center">
    <h1 class="p-4">Vybrané reference</h1>
    <div class="container text-center">
      <div class="row row-cols-1">
        <div class="col-md-2 col-4">
          <div class="row p-3 mb-3 tab" :class="{ 'active-tab': this.firstTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button @click="handleTabClicked('first')" class="nav-link" :class="firstTabStatus" type="button"
                aria-expanded="false" aria-controls="collapseReferenceFirst"><i class="fa-solid fa-1"></i></button>
            </nav>
          </div>
          <div class="row p-3 tab" :class="{ 'active-tab': this.secondTabStatus === 'active' }">
            <nav class="nav flex-column">
              <button @click="handleTabClicked('second')" class="nav-link" :class="secondTabStatus" type=" button"
                aria-expanded="false" aria-controls="#collapseReferenceSecond"><i class="fa-solid fa-2"></i></button>
            </nav>
          </div>
        </div>
        <div class="col-md-10 col-8 reference-detail px-5 py-2 pb-4 shadow">
          <div class="row text-start ">
            <div class="collapse show " id="collapseReferenceFirst" ref="collapseFirst">
              <h2 class="pt-3">1. reference</h2>
              <hr class="references-underline">
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, cumque vel quam
                asperiores omnis ex similique. Modi, quibusdam cupiditate corrupti dignissimos, porro delectus alias
                commodi, excepturi vitae culpa suscipit possimus?</p>
              <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3">
                <div v-for="(img) in testGalleryJson" :key="img.id" class="col">
                  <img :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'" class="img-fluid" alt="galerry img of rail">
                </div>
              </div>
            </div>
          </div>
          <div class="row text-start">
            <div class="collapse" id="collapseReferenceSecond" ref="collapseSecond">
              <h2 class="pt-3">2. reference</h2>
              <hr class="references-underline">
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque facere cum officiis
                harum sed vel
                in sapiente aut numquam cupiditate voluptatibus ea, tenetur blanditiis similique. Odit voluptas nihil
                soluta non?</p>
              <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3">
                <div v-for="(img) in testGalleryJson" :key="img.id" class="col">
                  <img :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'" class="img-fluid" alt="galerry img of rail">
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>
</template>

<script>
import { useTemplateRef } from 'vue';
import * as bootstrap from "bootstrap";
import test_gallery_JSON from '../objects/test-reference-gallery.json'


export default {
  data() {
    return {
      testGalleryJson: test_gallery_JSON,
      isFirstTabActive: true,
      isSecondTabActive: false,
      firstTabStatus: 'active',
      secondTabStatus: 'non-active'
    }
  },
  methods: {
    collapseElement(elementToShow, elementToHide) {
      const bsCollapse = new bootstrap.Collapse(elementToShow, {
        toggle: false // Prevent auto toggle on init
      });
      const bsCollapseHide = new bootstrap.Collapse(elementToHide, {
        toggle: false // Prevent auto toggle on init
      });

      bsCollapse.show(); // Or .show() to expand
      bsCollapseHide.hide();
    },
    activateTab(clickedTab) {
      // if (clickedTab === 'second') {
      //   this.isFirstTabActive = false;
      //   this.isSecondTabActive = true;
      // } else {
      //   this.isFirstTabActive = true;
      //   this.isSecondTabActive = false;
      // }
      if (clickedTab === 'second') {
        this.secondTabStatus = 'active';
        this.firstTabStatus = 'non-active';
      } else {
        this.secondTabStatus = 'non-active';
        this.firstTabStatus = 'active';
      }
    },
    handleTabClicked(clickedTab) {
      if (clickedTab === 'first') {
        this.collapseElement(this.$refs.collapseFirst, this.$refs.collapseSecond)
      } else {
        this.collapseElement(this.$refs.collapseSecond, this.$refs.collapseFirst)
      }
      this.activateTab(clickedTab)
    }
  }

}


</script>