function showClearIcon() {
    document.getElementById('fa_x').style.opacity = "1";
    document.getElementById('fa-magnifying-glass').style.color = "black";
}

function hideClearIcon() {
    const searchInput = document.getElementById('search');
    if (searchInput.value === "") {
        document.getElementById('fa_x').style.opacity = "0";
        document.getElementById('fa-magnifying-glass').style.color = "gray";
    }
}

function clearSearch() {
    const searchInput = document.getElementById('search');
    searchInput.value = "";
    hideClearIcon();
}

function dropSignOut() {
    var signOutElement = document.querySelector('.sign_out');
    signOutElement.classList.toggle('visible');
}

function showAboutFood() {
    document.getElementById('about_food').style.opacity = "1";
    document.getElementById('about_food').style.pointerEvents = "auto";
    document.querySelector('header').style.filter = "blur(2px)";
    document.querySelector('main').style.filter = "blur(2px)";
    document.querySelector('footer').style.filter = "blur(2px)";
}

function closeAboutFood() {
    document.getElementById('about_food').style.opacity = "0";
    document.getElementById('about_food').style.pointerEvents = "none";
    document.querySelector('header').style.filter = "blur(0px)";
    document.querySelector('main').style.filter = "blur(0px)";
    document.querySelector('footer').style.filter = "blur(0px)";
}