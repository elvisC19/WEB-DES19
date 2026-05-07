listanombres = [];
    listaedades = [];
    listacarreras = [];

    cantEstudiantes = 0;

    function anadirAlumno(){

        nombre =
        document.querySelector("#name").value;

        edad =
        document.querySelector("#age").value;

        carrera =
        document.querySelector("#carrera").value;

        if(nombre == "" || edad == "" || carrera == ""){
            alert("Complete todos los campos");
            return;
        }

        listanombres[cantEstudiantes] = nombre;

        listaedades[cantEstudiantes] = edad;

        listacarreras[cantEstudiantes] = carrera;

        cantEstudiantes++;

        rellenarTabla();

        document.querySelector("#name").value = "";

        document.querySelector("#age").value = "";

        document.querySelector("#carrera").value = "";

    }

    function rellenarTabla(){

        fila =
        document.querySelector('.tabla');

        html = `
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Carrera</th>
            <th>Accion</th>
        </tr>`;

        for(i = 0 ; i < cantEstudiantes ; i++){

            clase = "";

            if(listaedades[i] > 25){
                clase = "mayor";
            }

            html +=
            `<tr class="`+clase+`">

                <td>` + listanombres[i] + `</td>

                <td>` + listaedades[i] + `</td>

                <td>` + listacarreras[i] + `</td>

                <td>
                    <button class="eliminar"
                    onclick="eliminar(`+i+`)">
                    Eliminar
                    </button>
                </td>

            </tr>`;
        }

        fila.innerHTML = html;

        document.querySelector("#total").innerHTML =
        "Total estudiantes registrados: " +
        cantEstudiantes;

    }

    function eliminar(posicion){

        listanombres.splice(posicion,1);

        listaedades.splice(posicion,1);

        listacarreras.splice(posicion,1);

        cantEstudiantes--;

        rellenarTabla();

    }