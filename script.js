let getLatitude, getLongitude;
let speech;
let i = 0;
let finish = false;
let prankSpeechID;

window.addEventListener('DOMContentLoaded',(e)=>{
    if(location.href.includes('index.php')){
        getCoordinates();
    }else if(location.href.includes('prank.html')){
        prankSpeechID = document.querySelector('#prank-speech');
        getCoordinates();
        prankSpeech();
    }else if(location.href.includes('video.html')){
        let explosion = new Audio('explosion.mp3');
        explosion.play();
    }
});

function getCoordinates(){
    let successPosition = function(position){
        getLatitude = position.coords.latitude;
        getLongitude = position.coords.longitude;

        document.querySelector('#set-latitude').value = getLatitude;
        document.querySelector('#set-longitude').value = getLongitude;
        document.querySelector('#gps').value = "true";
    }
    let failedPosition = function(error){
        console.log(error);
        alert("Please turn on the gps to count!!");
    }
    let Options = {
        enableHighAccuracy: true,
        maximumAge: 0
    }
    navigator.geolocation.getCurrentPosition(successPosition, failedPosition, Options);
}

function prankSpeech(){
    speech = `Issa prank, the hacker got your exact location. Your coordinates are ${getLatitude} latitude and ${getLongitude} longitude. You have five seconds to leave your house :) hehe.`;
    if(i >= speech.length){
        i = 5;
        setTimeout(countdown, 2000);
        return;
    }
    prankSpeechID.innerHTML += speech.charAt(i);
    i++;
    setTimeout(prankSpeech, 100);
}

function countdown(){
    if(i < 0){
        location.href = 'video.html';
        return;
    }
    prankSpeechID.innerHTML = i;
    i--;
    setTimeout(countdown, 1000);
}
