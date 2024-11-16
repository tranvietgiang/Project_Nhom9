const produst = document.querySelector(".list-img");
const imgs = document.querySelectorAll(".owl-item");
const btnL = document.querySelector(".btn-leght");
const btnR = document.querySelector(".btn-right");
const listpro = document.querySelector(".listpro");
const listanh = document.querySelectorAll(".owl-item1");
const btnL1 = document.querySelector(".btn-leght1");
const btnR1 = document.querySelector(".btn-right1");
const btnL2 = document.querySelector(".btn-leght2");
const btnR2 = document.querySelector(".btn-right2");
const listpro1 = document.querySelector(".listpro1");
const listanh1 = document.querySelectorAll(".owl-item2");
const produst1 = document.querySelector(".row");

let i = 0;
let lengh = imgs.length;
let n = 0;
let lenpro = listanh.length;
let n1 = 0;
let lenpro1 = listanh1.length;
// kéo chuột
let isDragging = false;
let currentX;
let initialX;
let xOffset = 0;
produst1.addEventListener("mousedown", dragStart);
produst1.addEventListener("mouseup", dragEnd);
produst1.addEventListener("mousemove", drag);
function dragStart(e) {
  initialX = e.clientX - xOffset;
  isDragging = true;
  produst1.classList.add("dragging");
}
function dragEnd() {
  initialX = currentX;
  isDragging = false;
  produst1.classList.remove("dragging");
}
function drag(e) {
  if (isDragging) {
    e.preventDefault();

    currentX = e.clientX - initialX;
    xOffset = currentX;

    setTranslate(currentX, produst1);
  }
}
// end kéo chuột

const handel1 = () => {
  if (n == lenpro - 5) {
    n = 0;
    let width = listanh[0].offsetWidth;
    listpro.style.transform = `translateX(0px)`;
  } else {
    n++;
    let width = listanh[0].offsetWidth;
    listpro.style.transform = `translateX(${(width * -1 - 80) * n}px)`;
  }
};
const handel2 = () => {
  if (n1 == lenpro1 - 4) {
    n1 = 0;
    let width = listanh1[0].offsetWidth;
    listpro1.style.transform = `translateX(0px)`;
  } else {
    n1++;
    let width = listanh1[0].offsetWidth;
    listpro1.style.transform = `translateX(${(width * -1 - 80) * n1}px)`;
  }
};
let R2 = setInterval(handel2, 5000);
btnR2.addEventListener("click", () => {
  clearInterval(R2);
  handel2();
  R2 = setInterval(handel2, 5000);
});
btnL2.addEventListener("click", () => {
  clearInterval(R2);
  if (n1 == 0) {
    n1 = lenpro1 - 4;
    let width = listanh1[0].offsetWidth;
    listpro1.style.transform = `translateX(${(width * -1 - 80) * n1}px)`;
  } else {
    n1--;
    let width = listanh1[0].offsetWidth;
    listpro1.style.transform = `translateX(${(width * -1 - 80) * n1}px)`;
  }
  R2 = setInterval(handel2, 5000);
});

let R1 = setInterval(handel1, 5000);
btnR1.addEventListener("click", () => {
  clearInterval(R1);
  handel1();
  R1 = setInterval(handel1, 5000);
});
btnL1.addEventListener("click", () => {
  clearInterval(R1);
  if (n == 0) {
    n = lenpro - 4;
    let width = listanh[0].offsetWidth;
    listpro.style.transform = `translateX(${(width * -1 - 80) * n}px)`;
  } else {
    n--;
    let width = listanh[0].offsetWidth;
    listpro.style.transform = `translateX(${(width * -1 - 80) * n}px)`;
  }
  R1 = setInterval(handel1, 5000);
});

const handel = () => {
  if (i == lengh - 3) {
    i = 0;
    let width = imgs[0].offsetWidth;
    produst.style.transform = `translateX(0px)`;
  } else {
    i++;
    let width = imgs[0].offsetWidth;
    produst.style.transform = `translateX(${(width * -1 - 30) * i}px)`;
  }
};

let R = setInterval(handel, 4000);

btnR.addEventListener("click", () => {
  clearInterval(R);
  handel();
  R = setInterval(handel, 4000);
});
btnL.addEventListener("click", () => {
  clearInterval(R);
  if (i == 0) {
    i = lengh - 4;
    let width = imgs[0].offsetWidth;
    produst.style.transform = `translateX(${(width * -1 - 40) * i}px)`;
  } else {
    i--;
    let width = imgs[0].offsetWidth;
    produst.style.transform = `translateX(${(width * -1 - 40) * i}px)`;
  }
  R = setInterval(handel, 4000);
});
