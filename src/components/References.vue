<template>
  <section id="references" class="p-md-5 p-2 text-center">
    <h1 class="p-4">Vybrané reference</h1>
    <div class="container text-center">
      <div class="row row-cols-1">
        <!-- <div class="col-md-3 col-4">
          <div class="reference-preview-img">
            <div class="row p-3">
              <button class="nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReferenceFirst"
                aria-expanded="false" aria-controls="collapseReferenceFirst">Rodinný dům</button>
            </div>
          </div>
        </div> -->
        <div class="col-md-2 col-4">
          <div class="row p-3 active">
            <nav class="nav flex-column">
              <button class="nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReferenceFirst"
                aria-expanded="false" aria-controls="collapseReferenceFirst"><i class="fa-solid fa-1"></i></button>
            </nav>
          </div>
          <div class="row p-3">
            <nav class="nav flex-column">
              <button class="nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReferenceSecond"
                aria-expanded="false" aria-controls="#collapseReferenceSecond"><i class="fa-solid fa-2"></i></button>
            </nav>
          </div>
        </div>
        <div class="col-md-10 col-8 reference-detail px-5 py-2">
          <div class="row text-start">
            <h2 class="pt-3">Rodinny dum</h2>
            <hr class="references-underline">
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
            <div class="collapse show" id="collapseReferenceFirst">
              <p class="lead">...Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
              <div id="galerry-preview" class="row row-cols-md-3 row-cols-1 gy-3 gx-3">
                <div v-for="(img) in testGalleryJson" :key="img.id" class="col">
                  <img :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'" class="img-fluid" alt="galerry img of rail">
                </div>
              </div>
            </div>
          </div>
          <div class="row text-start">
            <div class="collapse" id="collapseReferenceSecond">
              <h2 class="pt-3">2. reference</h2>
              <hr class="references-underline">
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque facere cum officiis
                harum sed vel
                in sapiente aut numquam cupiditate voluptatibus ea, tenetur blanditiis similique. Odit voluptas nihil
                soluta non?</p>
              <div id="galerry-preview" class="row row-cols-md-4 row-cols-1 gy-3 gx-3">
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
import test_gallery_JSON from '../objects/test-reference-gallery.json'


export default {
  data() {
    return {
      testGalleryJson: test_gallery_JSON,
    }
  },
  methods: {

  }
}


</script>