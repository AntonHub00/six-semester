function init_date(){
  var f = new Date();
  var mes = f.getMonth() + 1;
  var dia = f.getDate();
  var ano = f.getFullYear();
  console.log(mes);
  console.log(dia);
  console.log(ano);


  if(dia < 10)
    dia = '0' + dia;

  if(mes < 10)
    mes = '0' + mes;

  document.getElementById('date-form').value = ano + '-' + mes + '-' + dia;
}

function set_rfc(){
  mySelect = document.getElementById('proveedor');
  mi_nuevo_rfc = mySelect.options[mySelect.selectedIndex].getAttribute('rfc');
  document.getElementById('rfc').value = mi_nuevo_rfc;
}

function init(){
  init_date();
}

window.onload = init;
