function lanzar(id,id_btn) {
  var aleatorio = Math.random() * (7 - 1) + 1;
  document.getElementById('txtDado').innerHTML = Math.floor(aleatorio);
  aleatorio = Math.floor(aleatorio)*100;
  document.getElementById('txtAvanzar').innerHTML = aleatorio + "m";
  var inputRecorrido = document.getElementById('txtRecorrido' + id);
  inputRecorrido.value = aleatorio;
  habilitar(id_btn + "" + id);
}

function habilitar(id){

  document.getElementById(id).disabled = false;
}

function deshabilitar(id){

  document.getElementById(id).disabled = true;
}




