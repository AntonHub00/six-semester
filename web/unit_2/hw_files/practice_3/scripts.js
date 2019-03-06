function hacer_click(){
  alert('Hizo click!');
}

function entro_mouse(){
  alert('El mouse ha entrado');
}

function salio_mouse(){
  alert('El mouse ha salido');
}

function asociar_elementos(){
  document.getElementsByTagName('p')[1].onmouseenter = entro_mouse;
  document.getElementsByTagName('p')[2].onmouseout = salio_mouse;
}

function asociar2(){
  var elemento = document.getElementsByTagName('p')[0];
  elemento.addEventListener('onclick', hacer_click, false);
}

window.addEventListener('load', asociar2, false);

window.onload = asociar_elementos;
