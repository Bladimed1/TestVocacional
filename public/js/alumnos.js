    // 1.- FILTRO POR GRUPOS
        document.getElementById('filtroGrupo').addEventListener('change', function () {
            let grupoSeleccionado = this.value;

            let filas = document.querySelectorAll('.fila-alumno');

            filas.forEach(fila => {
                // Sacamos el grupo de la fila actual leyendo su data-grupo
                let grupoDeLaFila = fila.getAttribute('data-grupo');

                // Si elegimos 'Todos' o si el grupo de la fila coincide con el elegido...
                if (grupoSeleccionado === 'Todos' || grupoSeleccionado === grupoDeLaFila) {
                    fila.style.display = ''; // ...mostramos la fila
                } else {
                    fila.style.display = 'none'; // ...si no, la ocultamos
                }
            });
        });

    // 2.- BUSCADOR POR MATRÍCULA
        document.getElementById('buscadorMatricula').addEventListener('input', function () {
            let textoBuscado = this.value.trim().toLowerCase();
            let filas = document.querySelectorAll('.fila-alumno');

            filas.forEach(fila => {
                let matriculaDeLaFila = fila.getAttribute('data-matricula').toLowerCase();
                if (matriculaDeLaFila.includes(textoBuscado)) {
                    fila.style.display = '';
                } else {
                    fila.style.display = 'none';
                }
            });
        });