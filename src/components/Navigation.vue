<script setup>
import logo from '../imgs/logo_zabradli_hanak.png'
</script>

<template>
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg shadow-sm"> <!--bg-body-tertiary-->
      <div class="container-fluid">
        <div class="navbar-brand">
          <img class="img-logo" :src="logo" alt="Logo Zábradlí Hanák">
        </div>

        <button class="navbar-toggler navigation-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div @click="collapseElement($refs.collapseNavbar)" class="collapse navbar-collapse flex-grow-0"
          id="navbarSupportedContent" ref="collapseNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Úvod</a> <!--mozno pouzit class "active"-->
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#process">Služby</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">Galerie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#references">Reference</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#footer">Kontakt</a>
            </li>
          </ul>
        </div>

        <div class="navbar-contact-details d-lg-block d-none">
          <ul class="navbar-nav">
            <li>Marek Hanák</li>
            <li><i class="fa-solid fa-phone icon-contact-details fa-fw" style="color: #a40c24;"></i> 606 146 985</li>
            <li><i class="fa-solid fa-location-dot icon-contact-details fa-fw" style="color: #a40c24;"></i> Kozojídky
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import { useTemplateRef } from 'vue';
import * as bootstrap from "bootstrap";

export default {
  methods: {
    collapseElement(elementToHide) {
      const bsCollapseHide = new bootstrap.Collapse(elementToHide, {
        toggle: false // Prevent auto toggle on init
      });

      // bsCollapse.show(); // Or .show() to expand
      bsCollapseHide.hide();
    }
  }
}
</script>