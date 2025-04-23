<script setup>
import Navigation from './components/Navigation.vue'
import Introduction from './components/Introduction.vue'
import Process from './components/Process.vue'
import Gallery from './components/Gallery.vue'
import References from './components/References.vue'
import FooterSection from './components/footer/Footer.vue'
</script>

<template>
  <Navigation />
  <main>
    <Introduction />
    <Process />
    <Gallery />
    <References />
  </main>
  <FooterSection />
</template>