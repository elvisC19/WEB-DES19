let seleccionado;

        function seleccionar(id){

       
            if(seleccionado != null){
                document.getElementById(seleccionado).classList.remove("seleccionado");
            }
            seleccionado = id;
            document.getElementById(seleccionado).classList.add("seleccionado");

            texto =document.getElementById(seleccionado).innerHTML;
            document.getElementById("texto").innerHTML ='Elemento seleccionado: "' + texto + '"';

        }

        function cambiarColor(){
            let color =document.getElementById("nuevocolor").value;
            document.getElementById(seleccionado).style.backgroundColor = color;

        }