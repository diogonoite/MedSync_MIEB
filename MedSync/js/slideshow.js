var slideIndex=1;
var timer = null;
showSlides(slideIndex);

// function plusSlides(n){
//     showSlides(slideIndex += n);
// }

// function currentSlide(n){
//     showSlides(slideIndex =n);
// }

// function showSlides(n){
//     var i;
//     var slides = document.getElementsByClassName("mySlides");
//     var dots = document.getElementsByClassName("dot");
//     if (n>slides.length) {slideIndex = 1}
//     if (n<1) {slideIndex = slides.length}
//     for (i=0; i<slides.length; i++) {
//             slides[i].style.display = "none";
//     }
//     for (i=0; i<dots.length; i++){
//         dots[i].className=dots[i].className.replace(" active", "");
//     }
//     slides[slideIndex-1].style.display ="block";
//     dots[slideIndex-1].className += " active";
// }

// automático
// function showSlides(){
//     var i;
//     var slides = document.getElementsByClassName("mySlides");
//     var dots= document.getElementsByClassName("dot");
//     for (i=0; i<slides.length;i++){
//         slides[i].style.display="none";
//     }
//     slideIndex++;
//     if(slideIndex>slides.length){slideIndex=1}
//     for (i=0; i<dots.length; i++){
//         dots[i].className = dots[i].className.replace(" active","");
//     }
//     slides[slideIndex-1].style.display="block";
//     dots[slideIndex-1].className +=" active";
//     setTimeout(showSlides,5000);
// }

// automático/manual
function plusSlides(n){
    clearTimeout(timer);
    showSlides(slideIndex += n);
}
function currentSlide(n){
    clearTimeout(timer);
    showSlides(slideIndex=n);
}
function showSlides(n){
    var i;
    var slides= document.getElementsByClassName("mySlides");
    var dots= document.getElementsByClassName("dot");

    if(n===undefined){n=++slideIndex}
    if (n>slides.length){slideIndex=1}
    if(n<1){slideIndex=slides.length}
    for (i=0; i<slides.length;i++){
        slides[i].style.display="none";
     }
    for (i=0; i<dots.length; i++){
        dots[i].className = dots[i].className.replace(" active","");
     }

    slides[slideIndex-1].style.display="block";
    dots[slideIndex-1].className +=" active";
    timer= setTimeout(showSlides,5000);
}
