<template>
  <section id="references" class="p-5 m-5">
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <img src="../imgs/galery-imgs/small/104.jpg" alt="">
        </div>
        <div class="col">
          <div class="container text-start">
            <div class="row">
              <h1>1. reference</h1>
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque facere cum officiis
                harum sed vel
                in sapiente aut numquam cupiditate voluptatibus ea, tenetur blanditiis similique. Odit voluptas nihil
                soluta non?</p>
            </div>
            <div id="galerry-preview" class="row">
              <div v-for="(img) in testGalleryJson" :key="img.id" class="col">
                <img :src="'../imgs/galery-imgs/big/' + img.id + '.jpg'" class="img-fluid" alt="galerry img of rail">
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
console.log(test_gallery_JSON);

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