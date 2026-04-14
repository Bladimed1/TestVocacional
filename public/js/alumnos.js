document.addEventListener('DOMContentLoaded', function() {

    // 1.- FILTRO POR GRUPOS (Se activa solo en la vista general)
    const selectorGrupo = document.getElementById('filtroGrupo');

    if (selectorGrupo) {
        selectorGrupo.addEventListener('change', function () {
            let grupoSeleccionado = this.value;
            let filas = document.querySelectorAll('.fila-alumno');

            filas.forEach(fila => {
                // Obtenemos el grupo guardado en el atributo data-grupo de la fila
                let grupoDeLaFila = fila.getAttribute('data-grupo');

                if (grupoSeleccionado === 'Todos' || grupoSeleccionado === grupoDeLaFila) {
                    fila.style.display = ''; 
                } else {
                    fila.style.display = 'none';
                }
            });
        });
    }

    // 2.- BUSCADOR POR MATRÍCULA (Funciona tanto en vista general como en grupos)
    // Buscamos el input, ya sea que tenga el ID 'buscadorMatricula' o 'buscadorAlumnos'
    const inputBuscador = document.getElementById('buscadorMatricula') || document.getElementById('buscadorAlumnos');

    if (inputBuscador) {
        inputBuscador.addEventListener('input', function () {
            let textoBuscado = this.value.trim().toLowerCase();
            let filas = document.querySelectorAll('.fila-alumno');

            filas.forEach(fila => {
                // Obtenemos la matrícula guardada en el data-matricula de la fila
                let matriculaDeLaFila = fila.getAttribute('data-matricula').toLowerCase();
                
                if (matriculaDeLaFila.includes(textoBuscado)) {
                    fila.style.display = '';
                } else {
                    fila.style.display = 'none';
                }
            });
        });
    }
});