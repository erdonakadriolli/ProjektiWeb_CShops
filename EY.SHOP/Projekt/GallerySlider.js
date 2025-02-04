let scrollContainer = document.querySelector(".gallery");
let pas = document.getElementById("pas");
let para = document.getElementById("para");

scrollContainer.addEventListener("wheel", (evt) => {
    evt.preventDefault();
    scrollContainer.scrollLeft += evt.deltaY;
});

para.addEventListener("click", () =>{
    scrollContainer.style.scrollBehavior = "smooth";
    scrollContainer.scrollLeft += 900;
});
pas.addEventListener("click", () => {
    scrollContainer.style.scrollBehavior = "smooth";
    scrollContainer.scrollLeft -= 900;
});
//=========================================================
let scrollContainer1 = document.querySelector(".gallery-1");
let pas1 = document.getElementById("pas1");
let para1 = document.getElementById("para1");

scrollContainer1.addEventListener("wheel", (evt) => {
    evt.preventDefault();
    scrollContainer1.scrollLeft += evt.deltaY;
});

para1.addEventListener("click", () =>{
    scrollContainer1.style.scrollBehavior = "smooth";
    scrollContainer1.scrollLeft += 900;
});
pas1.addEventListener("click", () => {
    scrollContainer1.style.scrollBehavior = "smooth";
    scrollContainer1.scrollLeft -= 900;
});

