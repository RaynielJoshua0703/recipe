function showSignUp(){
    document.getElementById('signup').style.opacity="1";
    document.getElementById('signup').style.pointerEvents="auto";
    document.querySelector('header').style.filter="blur(2px)";
    document.querySelector('main').style.filter="blur(2px)";
}
function closeSignUp() {
    document.getElementById('signup').style.opacity="0";
    document.getElementById('signup').style.pointerEvents="none";
    document.querySelector('header').style.filter="blur(0px)";
    document.querySelector('main').style.filter="blur(0px)";
}