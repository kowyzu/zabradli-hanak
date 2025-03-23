import "../scss/styles.scss";
import * as bootstrap from "bootstrap";

import { library, dom } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";

import "animate.css";

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

//
// On scroll animation
// -------------------
document.addEventListener("DOMContentLoaded", () => {
  const waypoint = document.querySelector(".waypoint");
  const processStepsFirstRow = document.querySelectorAll(
    ".process-step-first-row"
  );
  const processStepsSecondRow = document.querySelectorAll(
    ".process-step-second-row"
  );

  processStepsFirstRow.forEach((processStepFirst, index) => {
    setTimeout(() => {
      processStepFirst.classList.add("show");
    }, index * 500); // postupné zobrazování
  });

  const observer = new IntersectionObserver(
    (entries) => {
      if (entries[0].isIntersecting) {
        processStepsSecondRow.forEach((processStepSecond, index) => {
          setTimeout(() => {
            processStepSecond.classList.add("show");
          }, index * 500); // postupné zobrazování
        });
        observer.disconnect(); // zajistí, že se animace spustí jen jednou
      }
    },
    { threshold: 1.0 }
  );

  observer.observe(waypoint);
});

//
// Gallery show more
// -----------------
