let progressBar = document.querySelector(".progress-bar");
let timeRunning = 3000;
let timeAutoNext = 7000;
function startProgressBar() {
  // Reset thanh tiến trình về 0%
  progressBar.style.width = "0";

  // Delay để thanh tiến trình bắt đầu từ từ
  setTimeout(() => {
    progressBar.style.width = "100%"; // Thanh tiến trình chạy đến 100%
  }, timeRunning); // Delay nhỏ để đảm bảo hiệu ứng chạy mượt mà

  clearTimeout();
}

// move image
const list_img = document.querySelector(".list_image");
const item_img = document.querySelectorAll(".img_move");
const icon_left = document.querySelector(".button_1");

let current = 0;

const eventSidle = () => {
  current++;
  if (current >= item_img.length) {
    current = 0; // Quay lại đầu khi đến phần tử cuối cùng
  }
  let width = item_img[0].offsetWidth; // Lấy chiều rộng của ảnh đầu tiên
  item_img.style.transform = `translateX(${-width * current}px)`; // Di chuyển các hình ảnh
};

let handleEventChangeSlide = setInterval(eventSidle, 4000);

icon_left.addEventListener("click", () => {
  clearInterval(handleEventChangeSlide); // Dừng chuyển động tự động khi nhấn nút
  eventSidle(); // Chạy hiệu ứng chuyển động một lần
  handleEventChangeSlide = setInterval(eventSidle, 4000); // Khởi động lại chuyển động tự động
});
