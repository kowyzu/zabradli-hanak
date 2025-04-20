<script setup>
import logoPartner from '../imgs/partner-logo/logo-alumit-normal.png'
</script>

<template>
  <footer id="footer" class="mt-5 py-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 pt-5 pb-lg-5 pb-0">
          <h3 class="mb-4">Napište nám</h3>
          <form class="pe-lg-5">
            <div class="row mb-3 justify-content-center">
              <div class="col">
                <div class="input-group">
                  <div class="input-group-text"><i class="fa-solid fa-user fa-fw"></i></div>
                  <input type="text" class="form-control" id="inputName" placeholder="Jméno">
                </div>
              </div>
            </div>
            <div class="row mb-3 justify-content-center">
              <div class="col">
                <div class="input-group">
                  <div class="input-group-text"><i class="fa-solid fa-phone fa-fw"></i></div>
                  <input type="tel" class="form-control" id="inputTel" placeholder="Telefonní číslo">
                </div>
              </div>
            </div>
            <div class="row mb-3 justify-content-center">
              <div class="col">
                <div class="input-group">
                  <div class="input-group-text"><i class="fa-solid fa-envelope fa-fw"></i></div>
                  <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
              </div>
            </div>
            <div class="row mb-3 justify-content-center">
              <div class="col">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                  placeholder="Sdělte nám svou představu o ideálním zábradlí"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Odeslat</button>
          </form>
        </div>
        <div class="col-xl-7 pt-5 pb-5">
          <div class="row row-cols-md-2 row-cols-1">
            <div class="col mb-3">
              <h3 class="mb-4">Kontakt</h3>
              <ul class="list-unstyled">
                <li><strong>Marek Hanák</strong></li>
                <li>Kozojídky 142</li>
                <li class="mb-4">696 63 Kozojídky</li>
                <li>IČO: 621 65 551</li>
                <li><i class="fa-solid fa-phone icon-contact-details fa-fw me-2"></i>606 146 985</li>
                <li><i class="fa-solid fa-envelope icon-contact-details fa-fw me-2"></i>zabradlihanak@seznam.cz</li>
              </ul>
            </div>
            <div class="col">
              <h3 class="mb-4">Partner</h3>
              <p><a href="https://alumit.cz/" target="_blank"><img class="img-fluid" :src="logoPartner"
                    alt="ALUMIT logo"></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>
