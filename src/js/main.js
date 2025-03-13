import "../scss/styles.scss";
import * as bootstrap from "bootstrap";

import { library, dom } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";

library.add(fas);
dom.watch(); // Aplikuje ikony na HTML automaticky

//
// Introduction Carousel
// ---------------------
console.log("TODO - umoznit posouvani pomoci bttns a pak pokracovat v cycle");

const carouselIntroduction = new bootstrap.Carousel("#carouselIntroduction", {
  interval: 3500,
});

window.addEventListener("load", (event) => {
  carouselIntroduction.cycle();
});

// const carouselBtns = document.querySelectorAll(".carousel-btn");

// carouselBtns.forEach((carouselBtn) => {
//   carouselBtn.addEventListener("click", () => {
//     carouselIntroduction.next();
//   });
// });

// introText.addEventListener("click", () => {
//   carouselIntroduction.next();
// });
