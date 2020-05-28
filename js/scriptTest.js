var resultado = document.getElementById("resultado"); //con esto selecionamos el boton


document.getElementById("resultado").addEventListener("click", init); //Creamos un event lisener para el boton

window.onload = function () {
    init(); //creamos la funcion init
}
//Creamos dos variables de las dos oreguntas
var pregunta1 =undefined;
var pregunta2 =undefined;

function init() {
    //Comprobamos si los checked box estan marcados
   if(document.getElementById("si1").checked){
      pregunta1 = true;
      
   }
   if(document.getElementById("no1").checked){
     pregunta1 = false;
   
    }
    if(document.getElementById("si2").checked){
        pregunta2 = true;
        
     }
     if(document.getElementById("no2").checked){
       pregunta2 = false;
     
      }
//Y dependiendo de lo que marque el usuario nos mandara a un php o a otro
    if(pregunta1 === true && pregunta2 === true){
        location.href = "sisi.php"
        
    }
    if(pregunta1 === false && pregunta2 === false){
        location.href = "nono.php"
    }
    if(pregunta1 === true && pregunta2 === false){
        location.href = "sino.php"
    }
    if(pregunta1 === false && pregunta2 === true){
        location.href = "nosi.php"
    }
}

