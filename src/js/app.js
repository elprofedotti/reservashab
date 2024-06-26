document.addEventListener('DOMContentLoaded', function() {
    eventListener();
    darkMode();
    document.body.classList.remove('dark-mode');
});

function darkMode() {
    const prefiereDarkMode= window.matchMedia('(prefers-color-scheme: dark)');
    //console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }   
    })


    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}

function eventListener(){
    const mobileMenu=document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    console.log('desde navegacionResponsives');
    const navegacion=document.querySelector('.navegacion');

    /* if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    } */
    navegacion.classList.toggle('mostrar');
}

var table = document.querySelector('.tabla-responsive');
var headers = table.querySelectorAll('th');

table.querySelectorAll('tr').forEach(function (row) {
  row.querySelectorAll('td').forEach(function (cell, index) {
    cell.setAttribute('data-label', headers[index].textContent);
  });
});