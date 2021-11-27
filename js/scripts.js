feather.replace();

/* TOGGLE */
var toggle = document.querySelectorAll('.toggle');
var aside = document.querySelector('.aside');

for(i = 0; i < toggle.length; i++){
    toggle[i].addEventListener('click', funcToggle);
}

function funcToggle(){
    if(aside.classList.contains('hide-device-small')){
        aside.classList.remove('hide-device-small');
    }else{
        aside.classList.add('hide-device-small');
    }
}

/* PLAY AND PAUSE */
var buttonPlay = document.getElementById('button-play');
var buttonPause = document.getElementById('button-pause');
var audio = document.getElementById('audio');

window.onloadeddata = () => {
    audio.pause();
}

buttonPlay.addEventListener('click', playSong);
buttonPause.addEventListener('click', pauseSong);

function playSong(){
    audio.play();
    buttonPlay.classList.add('hide');
    buttonPause.classList.remove('hide');
}

function pauseSong(){
    audio.pause();
    buttonPlay.classList.remove('hide');
    buttonPause.classList.add('hide');
}


/* */

var searchInput = document.querySelectorAll('.search-input');
var searchResults = document.querySelector('.search-results');

for(i = 0; i < searchInput.length; i++){
    searchInput[i].addEventListener('click', openBox);
}

function openBox(){
    if(searchResults.classList.contains('hide')){
        searchResults.classList.remove('hide');
    }
    else{
        searchResults.classList.add('hide');
    }
}

/* */

var tocSong = document.querySelectorAll(".toc-song");
var plusSeconds = document.getElementById('plus-seconds');
var minusSeconds = document.getElementById('minus-seconds');
var resetAudio = document.getElementById('reset-audio');

tocSong.forEach((e) => {
var song = document.querySelector(".audio");
plusSeconds.addEventListener('click', funcPlusSeconds);
minusSeconds.addEventListener('click', funcMinusSeconds);
resetAudio.addEventListener('click', funcResetAudio);

function funcPlusSeconds(){
    song.currentTime =  song.currentTime + 15;
}
function funcMinusSeconds(){
    song.currentTime =  song.currentTime - 15;
}
function funcResetAudio(){
    song.currentTime = 0;
}
});



/* BOX HEIGHT */

var rowSong = document.querySelector('.ul-song');
var boxSong = document.querySelector('.box-song-one');

rowSong.style.maxHeight = boxSong.clientHeight + 'px';


/* SLIDER */

const boxOne = document.querySelector(".box-one");
const sliderElm = document.querySelector(".slide-ul");
const btnLeft = document.querySelector(".left-arrow");
const btnRight = document.querySelector(".right-arrow");

const numberSliderBoxs = sliderElm.children.length;
let idxCurrentSlide = 0;

function moveSlider() {
  let leftMargin = (boxOne.clientWidth) * idxCurrentSlide;
  sliderElm.style.marginLeft = -leftMargin + "px";
  console.log(sliderElm.clientWidth, leftMargin);
}
function moveLeft() {
  if (idxCurrentSlide === 0) idxCurrentSlide = numberSliderBoxs - 1;
  else idxCurrentSlide--;

  moveSlider();
}
function moveRight() {
  if (idxCurrentSlide === numberSliderBoxs - 1) idxCurrentSlide = 0;
  else idxCurrentSlide++;

  moveSlider();
}

btnLeft.addEventListener("click", moveLeft);
btnRight.addEventListener("click", moveRight);
window.addEventListener("resize", moveSlider);
