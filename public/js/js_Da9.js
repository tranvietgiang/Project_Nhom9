// Assuming you have a container element with the class 'animation-container'
const animationContainer = document.querySelector(".animation-container");

// Function to pause and resume the animation
function pauseResumeAnimation() {
  animationContainer.classList.toggle("paused");
}

// Initial pause
animationContainer.classList.add("paused");

// Trigger the animation after 4 seconds
setInterval(() => {
  animationContainer.classList.remove("paused");
}, 4000);

// move image
const sbImg = document.querySelector(".sb-img");
const images = document.querySelectorAll(".sb-img .img_move");
let active = 0;
let totalImages = images.length;

// khi click move img tồn time move image sẽ bị reset
const nextImage = () => {
  active = (active + 1) % totalImages; // Di chuyển sang ảnh tiếp theo
  sbImg.style.transform = `translateX(-${100 * active}vw)`;
  resetInterval();
};

const prevImage = () => {
  active = (active - 1 + totalImages) % totalImages; // Di chuyển về ảnh trước
  sbImg.style.transform = `translateX(-${100 * active}vw)`; // Di chuyển ảnh sang trái
  resetInterval();
};

// Tự động di chuyển sau mỗi 5 giây
const resetInterval = () => {
  clearInterval(moveImage); // Xóa interval hiện tại
  moveImage = setInterval(nextImage, 4000); // Tạo lại interval
};

// Tự động di chuyển sau mỗi 5 giây
moveImage = setInterval(nextImage, 4000);
