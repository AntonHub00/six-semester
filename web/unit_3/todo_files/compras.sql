create database if not exists compra;

use compra;

create table producto
(
  id INT,
  descripcion varchar(30),
  precio FLOAT(11, 2),
  constraint pk_id_producto primary key (id)
);

create table proveedor
(
  id INT,
  razon_social varchar(20),
  rfc varchar(20),
  telefono varchar(10),
  email varchar(30),
  calle varchar(30),
  numero varchar(10),
  colonia varchar(30),
  ciudad varchar(30),
  constraint pk_id_proveedor primary key (id)
);

create table encabezado
(
  id INT,
  proveedor_id INT,
  folio varchar(20),
  fecha date,
  constraint pk_id_encabezado primary key (id),
  constraint fk_proveedor_id_encabezado foreign key (proveedor_id)
  references proveedor (id)
  on update cascade
  on delete no action
);

create table detalle
(
  id INT,
  cantidad INT,
  producto_id INT,
  precio INT,
  encabezado_id INT,
  constraint pk_id_detalle primary key (id),
  constraint fk_producto_ida_detalle foreign key (producto_id)
  references producto (id)
  on update cascade
  on delete no action,
  constraint fk_encabezado_id_detalle foreign key (encabezado_id)
  references encabezado (id)
  on update cascade
  on delete no action
);
