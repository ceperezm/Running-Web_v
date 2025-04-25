window.onload = function () {
  var modal = document.getElementById("ventanaModal");
  var boton = document.getElementById("boton");
  var span = document.getElementsByClassName("cerrar")[0];

  // Mostrar el modal cuando se hace clic en el botón
  boton.addEventListener("click", function () {
    modal.style.display = "block";
  });

  // Cerrar el modal al hacer clic en la X
  span.addEventListener("click", function () {
    modal.style.display = "none";
  });

  // Cerrar el modal al hacer clic fuera del contenido
  window.addEventListener("click", function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  });
};
