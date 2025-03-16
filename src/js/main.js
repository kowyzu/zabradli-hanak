import "../scss/styles.scss";
import * as bootstrap from "bootstrap";

import { library, dom } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";

library.add(fas);
dom.watch(); // Aplikuje ikony na HTML automaticky

//
// Introduction Carousel
// ---------------------

const carouselIntroduction = new bootstrap.Carousel("#carouselIntroduction", {
  interval: 5000,
  pause: false,
  touch: true,
});

window.addEventListener("load", (event) => {
  carouselIntroduction.cycle();
});

const carouselBtns = document.querySelectorAll(".carousel-btn");

carouselBtns.forEach((carouselBtn) => {
  carouselBtn.addEventListener("click", () => {
    let targetIndex = carouselBtn.getAttribute("data-bs-slide-to");
    carouselIntroduction.to(targetIndex);
  });
});
