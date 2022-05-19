'use strict'

window.addEventListener('DOMContentLoaded', function(){
const dropbox = document.getElementById('dropbox');

dropbox.addEventListener('dragenter', function(evt){
  evt.preventDefault(); 
  dropbox.style.backgroundColor="red";
}, false);

dropbox.addEventListener('dragleave', function(evt){
  evt.preventDefault(); 
  dropbox.style.backgroundColor="";
}, false);

dropbox.addEventListener('dragover', function(evt){
  evt.preventDefault(); 
  dropbox.style.backgroundColor="red";
}, false);

dropbox.addEventListener('drop', verArchivo, false);
  
const body= document.getElementsByTagName("body")[0];
body.addEventListener('dragenter', function(evt){
  evt.preventDefault(); 
}, false);

body.addEventListener('dragover', function(evt){
  evt.preventDefault(); 
}, false);

body.addEventListener('drop', function(evt){
  evt.preventDefault(); 
}, false);
});
function verArchivo(e){
    e.preventDefault();
    let archivo=new FileReader();
    archivo.addEventListener('load',leer,false);
    archivo.readAsDataURL(e.dataTransfer.files[0]);
}
function leer(ev){
    dropbox.style.backgroundImage = "url('"+ev.target.result+"')";
    dropbox.style.backgroundSize = "cover";
    dropbox.style.backgroundPosition = "center";
    dropbox.style.backgroundRepeat = "no-repeat";
    let texto= document.getElementById("texto");
    texto.style.display="none";
}