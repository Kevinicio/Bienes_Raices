// Espera a que todo el HTML esté completamente cargado antes de ejecutar el código
document.addEventListener('DOMContentLoaded', function(){
    // Llama a la función que asigna los eventos
    eventListeners();
    darkMode();
    // ciegoModePagina();
});


// function ciegoModePagina(){
//     const pagina = window.location.pathname;//pagina contendra en la pagina que esta actualmente
//     switch (pagina){
//         case '/':
//             hablar('Bienvenido al inicio, en que puedo ayudarte?');
//             break;
//         case '/nosotros.php':
//             hablar('Bienvenido al apartado de nosotros');
//             break;
//         case '/anuncios.php':
//             hablar('Bienvenido al apartado de anuncios');
//             break;
//         case '/blog.php':
//             hablar('Bienvenido al apartado de blog');
//             break;
//         case '/contacto.php':
//             hablar('Bienvenido al apartado de contacto');
//             break;
//     }
//     function hablar(texto){
//         speechSynthesis.speak(new SpeechSynthesisUtterance(texto));
//     }
// }

// function applyCiego(){
//     document.body.();
// }




function darkMode(){
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');//Traernos las preferencias del usuario

    if(prefiereDarkMode.matches){//Si el usuario tiene habilitado dark mode en su dispositivo
        document.body.classList.add('dark-mode');
    }else{//Si el usuario no tiene habilitado dark mode en su dispositivo
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change',function(){
        if(prefiereDarkMode.matches){//Si el usuario tiene habilitado dark mode en su dispositivo
            document.body.classList.add('dark-mode');
        }else{//Si el usuario no tiene habilitado dark mode en su dispositivo
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click',applyDark);
}
function applyDark(){
    document.body.classList.toggle('dark-mode');//Body para que lo agregue en el body, "Para que se aplique a todo"
}

// Función que agrega los event listeners necesarios
function eventListeners(){
    // Selecciona el botón del menú hamburguesa
    const mobileMenu = document.querySelector('.mobile-menu');
    // Cuando se haga clic en el botón, ejecuta la función navegacionResponsive
    mobileMenu.addEventListener('click', navegacionResponsive);
}

// Función que controla el comportamiento del menú responsive
function navegacionResponsive(){
    // Selecciona el contenedor de la navegación
    const navegacion = document.querySelector('.navegacion');
    // Agrega o elimina la clase "mostrar"
    // Si la clase existe, la elimina.
    // Si no existe, la agrega.
    // Esto permite mostrar u ocultar el menú en dispositivos móviles.
    navegacion.classList.toggle('mostrar');
}