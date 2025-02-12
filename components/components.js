document.addEventListener("DOMContentLoaded", function () {
    fetch("../components/header.html")
        .then(response => response.text())
        .then(data => {
            document.getElementById("header-container").innerHTML = data;
        });
});
//=========================
document.addEventListener("DOMContentLoaded", function () {
    fetch("../components/sales.html")
        .then(response => response.text())
        .then(data => {
            document.getElementById("sales-container").innerHTML = data;
        });
});
//=========================
document.addEventListener("DOMContentLoaded", function () {
    fetch("../components/foooter.html")
        .then(response => response.text())
        .then(data => {
            document.getElementById("footer-container-1").innerHTML = data;
        });
});
