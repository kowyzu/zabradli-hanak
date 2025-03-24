<script setup>
import logo from '../imgs/logo_zabradli_hanak.png'


</script>
<template>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg shadow-sm"> <!--bg-body-tertiary-->
            <div class="container-fluid">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img class="img-logo" :src="logo" alt="Logo Zábradlí Hanák">
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Úvod</a> <!--mozno pouzit class "active"-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Služby</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery">Galerie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reference</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kontakt</a>
                        </li>
                    </ul>
                </div>

                <div class="container-fluid navbar-contact-details">
                    <ul class="navbar-nav">
                        <li>Marek Hanák</li>
                        <li><i class="fa-solid fa-phone icon-contact-details fa-fw" style="color: #a40c24;"></i> 606 146 985</li>
                        <li><i class="fa-solid fa-location-dot icon-contact-details fa-fw" style="color: #a40c24;"></i> Kozojídky</li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>