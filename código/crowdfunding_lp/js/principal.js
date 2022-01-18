let altura; // Guardar altura actual de la pantalla
let suavizado = 96; // Entre 1-99.999999, cuando mas alto mas smooth

function regresar() // La funcion onClick del boton regresar
{
    altura = document.documentElement.scrollTop; // Actualizar la posicion actual de la pantalla
    subirPantalla();
}

function subirPantalla() // Función recursiva que sube la pantalla gradualmente
{
    if(altura <= 1) { altura = 0 }// Por matematicas nunca puede llegar a 0, asi que se le ayuda manualmente    
    else
    {
        altura = altura*suavizado/100; // Calcular la altura de la siguiente iteracion
        document.documentElement.scrollTop = altura; // Mover la pantalla a la altura calculada

        setTimeout(function() { subirPantalla(); }, 5); // Esperar unos milisegundos para que se siente como una transicion
    }
}