window.onload = function () {
    var menuStyle = getComputedStyle(menu);
    openMenu.onclick = function () {
        if (menuStyle.display == "none"){
            menu.classList.add("active");
            this.innerHTML = "Закрыть меню";
        }
        else {
            menu.classList.remove("active");
            this.innerHTML = "Открыть меню"
        }
    }

}


