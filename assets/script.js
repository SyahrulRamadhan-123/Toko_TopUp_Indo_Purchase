const sliders = document.getElementById('sliders');
const totalSliders = sliders.children.length;
let currentIndex = 0;

function slideRigaht(){
    currentIndex++;
    if(currentIndex >= totalSliders){
        currentIndex = 0;
    }
    sliders.style.transform = `translateX(-${currentIndex * 500}px)`;
}
setInterval(slideRigaht, 3000);
