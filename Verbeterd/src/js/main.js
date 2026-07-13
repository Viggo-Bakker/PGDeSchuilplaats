function setBackground(backgroundImage) {
    const hero = document.body.querySelector(".page-hero");
    hero.style.backgroundImage = `url('src/assets/background-images/${backgroundImage}')`;
    const overlay = document.body.querySelector('.overlay');
    overlay.style.background = 'rgba(0, 0, 0, 0)'
    overlay.style.backdropFilter = 'saturate(100%)'
}