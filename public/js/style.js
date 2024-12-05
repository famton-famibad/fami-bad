/* public/js/style.js */

document.addEventListener("DOMContentLoaded", () => {
    console.log("ASICS WALKING page loaded");

    const headerIcons = document.querySelectorAll(".header-icons a");

    headerIcons.forEach(icon => {
        icon.addEventListener("click", (e) => {
            e.preventDefault();
            alert(`機能: ${icon.textContent} は現在準備中です。`);
        });
    });

    // Slider functionality
    const slides = document.querySelector(".banner .slides");
    const slideItems = document.querySelectorAll(".banner .slide");
    const prevButton = document.querySelector(".banner .controls .prev");
    const nextButton = document.querySelector(".banner .controls .next");
    const indicators = document.querySelectorAll(".banner .indicators button");

    let currentSlide = 0;

    function updateSlider(index) {
        slides.style.transform = `translateX(-${index * 100}%)`;
        indicators.forEach((btn, i) => {
            btn.classList.toggle("active", i === index);
        });
    }

    prevButton.addEventListener("click", () => {
        currentSlide = (currentSlide > 0) ? currentSlide - 1 : slideItems.length - 1;
        updateSlider(currentSlide);
    });

    nextButton.addEventListener("click", () => {
        currentSlide = (currentSlide < slideItems.length - 1) ? currentSlide + 1 : 0;
        updateSlider(currentSlide);
    });

    indicators.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            currentSlide = i;
            updateSlider(currentSlide);
        });
    });

    setInterval(() => {
        currentSlide = (currentSlide < slideItems.length - 1) ? currentSlide + 1 : 0;
        updateSlider(currentSlide);
    }, 5000);
});