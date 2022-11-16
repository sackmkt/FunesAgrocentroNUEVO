function confirmacion(e) {

   if (confirm("¿Estás seguro que queres eliminar este registro?")) {

 return true;

    } else {

    e.preventDefault();

    }

}

let linkDelete=document.querySelectorAll(".eliminaritemtabla");

for (var i = 0; i <linkDelete.length; i++) {

linkDelete[i].addEventListener('click', confirmacion);


}