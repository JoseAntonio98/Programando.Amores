let scrollImage = document.getElementById("scrollImage");
let buttonLeft = document.getElementById("buttonLeft");
let buttonRight = document.getElementById("buttonRight");
let svgIcons = document.getElementsByClassName("svg-icon");
let name = document.getElementById("name");
let email = document.getElementById("email");
let phone= document.getElementById("phone");
let amistad = document.getElementById("boton_personalizado");
let imagenes;
let nombres;
let correos;
let numeros;
let ides;
let contador = 1;
function getId($hola){
    $hola=contador;
    return $hola;
}
function relation(){
    amistad.href="/laravel/chat_love/public/friends/"+ides[contador]+"";
    
  
}
function getInformation(){
    name.innerHTML = "Name"+nombres[contador]+"";
    email.innerHTML = "Email address"+correos[contador]+"";
   
}
  
function getData($avatars){  
  
    imagenes=[$avatars.length];
    nombres=[$avatars.length];
    correos=[$avatars.length];
    numeros=[$avatars.length];
    ides=[$avatars.length];
    for( var i=0;i<$avatars.length;i++){
        imagenes[i]=$avatars[i].profile_image;
        nombres[i]=$avatars[i].name;
        correos[i]=$avatars[i].email;
        numeros[i]=$avatars[i].phone;
        ides[i]=$avatars[i].id;
    }
    getInformation()
    var url="http://localhost/laravel/chat_love/public/storage/"+imagenes[contador]+"";
    scrollImage.style.backgroundImage = "url("+url+")";

}
scrollImage.addEventListener("mouseenter",function()
{
    scrollImage.style.filter = "brightness(60%)";
    let opacidad = 0;
    let intervalo = setInterval(function()
    {
        svgIcons[0].setAttribute('opacity', opacidad);
        svgIcons[1].setAttribute('opacity', opacidad);
        opacidad+=0.1;
        if(opacidad > 1)
        {
            clearInterval(intervalo);
        }
    } , 50);
});
scrollImage.addEventListener("mouseleave",function()
{
    scrollImage.style.filter = "brightness(100%)";
    svgIcons[0].setAttribute('opacity', 0);
    svgIcons[1].setAttribute('opacity', 0);
});
buttonLeft.addEventListener("click",function()
{
    if(--contador==-1)
    {
        contador = imagenes.length-1;
    }
    var url="http://laravel/chat_love/public/storage/"+imagenes[contador]+"";
    scrollImage.style.backgroundImage = "url("+url+")";
    getInformation();
    
});
buttonRight.addEventListener("click",function()
{
    if(++contador==imagenes.length)
    {
        contador = 0;
    }
    var url="http://localhost/laravel/chat_love/public/storage/"+imagenes[contador]+"";
    scrollImage.style.backgroundImage = "url("+url+")";
    getInformation();
});
