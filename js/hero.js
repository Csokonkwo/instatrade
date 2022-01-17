 //array Of Images
 var images = ["img/hero_1.jpg" ,"img/hero_2.jpg" , "img/hero_3.jpg"] ;
 var imageHolder  = document.querySelector(".hero .container .box") ;
var count = 0;

//1 second - 1000 miliseconds

//calls the next function after 3 seconds
setInterval(next, 4000);

function previous () {
if(count <= 0) {
count = images.length-1;
}
else{
count--
} 
sendLink() 
} 

      
function next () {
if(count >= images.length-1) {
count =0;
}
else{
count++
} 
sendLink() 
} 

//sends url to div
function sendLink() {
imageHolder.style.backgroundImage = "url('"+images[count]+"')"
//alert(count)
} 