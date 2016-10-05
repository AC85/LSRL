
document.querySelector(".mobile-menu svg").addEventListener("click", function() {
    var mobMenu = document.querySelector(".mobile-menu");
    if(mobMenu.classList.contains("active")) {
        mobMenu.classList.remove("active");
    } else {
        mobMenu.classList.add("active");
    }
});
document.querySelector(".search svg").addEventListener("click", function() {
    var search = document.querySelector(".search");
    if(search.classList.contains("active")) {
        search.classList.remove("active");
    } else {
        search.classList.add("active");
    }
});