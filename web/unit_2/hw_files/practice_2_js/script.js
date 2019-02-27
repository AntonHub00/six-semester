function mostraralerta(){
  alert('hizo clic!');
}


function hacerclic(){

  //document.getElementsByTagName('p')[0].onclick=mostraralerta;

  //document.getElementById('id-p').onclick=mostraralerta;

  //document.getElementsByClassName('class-p')[0].onclick=mostraralerta;

  //document.querySelector('#id-p2').onclick=mostraralerta;

  //document.querySelectorAll('#principal p')[4].onclick=mostraralerta;

  //document.querySelector('#principal p:last-child').onclick=mostraralerta;

  var lista_p = document.querySelectorAll('#principal p');

  for(var i = 0; i < lista_p.length; i++){
    lista_p[i].onclick = mostraralerta;
  }

}


window.onload=hacerclic;
