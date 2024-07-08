function showSignIn(){
    document.getElementById('signin').style.opacity="1";
    document.getElementById('signin').style.pointerEvents="auto";
    document.querySelector('header').style.filter="blur(2px)";
    document.querySelector('main').style.filter="blur(2px)";
}
function closeSignIn(){
    document.getElementById('signin').style.opacity="0";
    document.getElementById('signin').style.pointerEvents="none";
    document.querySelector('header').style.filter="blur(0px)";
    document.querySelector('main').style.filter="blur(0px)";
}