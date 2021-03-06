var mobMenu = document.querySelector(".mobile-menu");
document.querySelector(".mobile-menu svg").addEventListener("click", function() {
    if(mobMenu.classList.contains("active")) {
        mobMenu.classList.remove("active");
    } else {
        mobMenu.classList.add("active");
    }
});

[].slice.call(document.querySelectorAll(".mobile-menu nav ul li")).map(function(node){
    node.addEventListener("click", function(evt) {
        var linkText = evt.target.innerText.toLowerCase();
        if(linkText === "impressum / datenschutz") {
            window.location.href = '/impressum';
            return;
        }
        if(linkText === "start") {
            window.location.href = '/';
            return;
        }
        if(linkText === "suche") {
            window.location.href = '/?s=';
            return;
        }

        var targetSection = document.querySelector("section[data-menu-item=\"" + evt.target.innerText.toLowerCase() + "\"]");
        if(targetSection) {
            document.querySelector("section.active").classList.remove("active");
            targetSection.classList.add("active");
            mobMenu.classList.remove("active");
        } else {
            console.error("section[data-menu-item=\"" + evt.target.innerText.toLowerCase() + "\"]" + " nich DA!");
        }

    });
});

document.querySelector(".search svg").addEventListener("click", function() {
    var search = document.querySelector(".search");
    if(search.classList.contains("active")) {
        search.classList.remove("active");
    } else {
        search.classList.add("active");
    }
});
