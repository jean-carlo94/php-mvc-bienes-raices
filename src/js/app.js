document.addEventListener('DOMContentLoaded',function(){
    eventListeners();

    darkmode();
});

function darkmode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    
    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    };

    prefiereDarkMode.addEventListener('change',function() {
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners(){
    const mobilMenu = document.querySelector('.mobile-menu');
    mobilMenu.addEventListener('click', navegacionResponsive);

    const metodoContacto = document.querySelectorAll('input[name="contacto"]');
    metodoContacto.forEach(input => input.addEventListener('click',mostrarMetodosContacto));
}

function mostrarMetodosContacto(ev){
    const contactoDiv = document.querySelector('#contactoctr')

    if(ev.target.value === 'telefono'){
        contactoDiv.innerHTML = `
            <label for="telefono">Numero</label>
            <input id="telefono" name="telefono" type="tel" placeholder="Tu Telefono" required> 
            
            <p>Seleccione Fecha y hora para ser contactado</p>
            <label for="fecha">Fecha</label>
            <input id="fecha" name="fecha" type="date" required> 
            <label for="hora">Hora</label>
            <input id="hora" name="hora" type="time" min="09:00" max="18:00" required> 
        `;
    }else{
        contactoDiv.innerHTML = `
            <label for="email">Tu Email</label>
            <input id="email" name="email" type="email" placeholder="Tu Email" required> 
        `;

    }
    
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar')
}
