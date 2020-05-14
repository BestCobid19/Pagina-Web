var resultado = document.getElementById("resultado");


document.getElementById("resultado").addEventListener("click", init);

window.onload = function () {
    init();
}

var pregunta1 =undefined;
var pregunta2 =undefined;

function init() {
    
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

