<template>
  <section id="contact-form" class="p-md-5">
    <div class="container">
      <div class="row row-cols-lg-2 row-cols-1">
        <div class="col text-center">
          <h3 class="pb-3">Napište nám</h3>
          <form>
            <div class="row mb-3 justify-content-center">
              <!-- <label for="inputName" class="col-sm-2 col-form-label">Vaše jméno *</label> -->
              <div class="col-sm-10">
                <div class="input-group">
                  <div class="input-group-text"><i class="fa-solid fa-user fa-fw"></i></div>
                  <input type="text" class="form-control" id="inputName" placeholder="Jméno *">
                </div>
              </div>
            </div>
            <div class="row mb-3 justify-content-center">
              <!-- <label for="inputTel" class="col-sm-2 col-form-label">Telefonní číslo</label> -->
              <div class="col-sm-10">
                <div class="input-group">
                  <div class="input-group-text"><i class="fa-solid fa-phone fa-fw"></i></div>
                  <input type="tel" class="form-control" id="inputTel" placeholder="Telefonní číslo">
                </div>
              </div>
            </div>
            <div class="row mb-3 justify-content-center">
              <!-- <label for="inputEmail" class="col-sm-2 col-form-label">Email *</label> -->
              <div class="col-sm-10">
                <div class="input-group">
                  <div class="input-group-text"><i class="fa-solid fa-envelope fa-fw"></i></div>
                  <input type="email" class="form-control" id="inputEmail" placeholder="Email *">
                </div>
              </div>
            </div>
            <div class="row mb-3 justify-content-center">
              <!-- <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Example textarea</label> -->
              <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  placeholder="Vaše zpráva"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Odeslat</button>
          </form>
        </div>
        <div class="col">
          <div class="row row-cols-md-2 row-cols-1">
            <div class="col mb-3">
              <h3>Kontakt</h3>
              <ul class="list-inline lead">
                <li class="list-inline-item">Marek Hanák</li>
                <li class="list-inline-item"><i
                    class="fa-solid fa-location-dot icon-contact-details fa-fw me-2"></i>Kozojídky 142</li>
                <li class="list-inline-item">But they're displayed inline.</li>
                <li class="list-inline-item">But they're displayed inline.</li>
                <li class="list-inline-item">But they're displayed inline.</li>
                <li class="list-inline-item">But they're displayed inline.</li>
                <li class="list-inline-item">But they're displayed inline.</li>
              </ul>
            </div>
            <div class="col">
              <h3 class="pb-3">Partner</h3>
            </div>
          </div>
          <!-- <div class="row">
            <h3 class="pb-3 text-center">Kontakt</h3>
            <h4 class="pb-3 text-center">Marek Hanák</h4>
            <div class="col-6 lead p-0">
              <div class="row justify-content-center">
                <div class="col-8 px-0">
                  <p><i class="fa-solid fa-location-dot icon-contact-details fa-fw me-2"></i>Kozojídky 142</p>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-8 px-0">
                  <p><i class="fa-solid fa-location-dot icon-contact-details fa-fw me-2 icon-helper"></i>696
                    63 Kozojídky</p>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-8 px-0">
                  <p><i class="fa-solid fa-location-dot icon-contact-details fa-fw me-2 icon-helper"></i>IČO:
                    621 65 551</p>
                </div>
              </div>
            </div>
            <div class="col-6 lead p-0">
              <div class="row justify-content-center">
                <div class="col-12 px-0">
                  <p><i class="fa-solid fa-phone icon-contact-details fa-fw me-2"></i>606
                    146
                    985</p>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-12 px-0">
                  <p><i class="fa-solid fa-envelope icon-contact-details fa-fw me-2"></i>zabradlihanak@seznam.cz</p>
                </div>
              </div>
            </div>

            <div class="row justify-content-center text-center mt-3">
              <div class="col-12 lead px-0">
                <p>Partner:<a href="https://alumit.cz/" target="_blank" class="ms-2 partner-link">alumit</a>
                </p>
              </div>
            </div>

          </div> -->
        </div>
      </div>
    </div>

  </section>
</template>
