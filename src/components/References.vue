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
        <div class="col-md-3 col-4">
          <ul class="nav flex-column">
            <li class="nav-item">
              <button class="nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReferenceFirst"
                aria-expanded="false" aria-controls="collapseReferenceFirst">Rodinný dům</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReferenceSecond"
                aria-expanded="false" aria-controls="collapseReferenceSecond">Něco venku třeba</button>
            </li>
          </ul>
        </div>
        <div class="col-md-9 col-8 reference-detail px-5 pt-2 pb-5">
          <div class="row text-start">
            <div class="collapse" id="collapseReferenceFirst">
              <h2 class="pt-3">1. reference</h2>
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
      <div class="row row-cols-1">
        <div class="col-md-3 col-4">
          <div class="reference-preview-img">
            <div class="row p-3 active">
              <button class="nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReferenceSecond"
                aria-expanded="false" aria-controls="collapseReferenceSecond">Něco venku třeba</button>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-8 reference-detail px-5 pt-2 pb-5">
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