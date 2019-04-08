## Creating table with namespace Creating table with namespacee

*.ibd (namespace)

## Moving tablespace files while the server is offline

show variables like "inno_db_dir%"

Investigar como modificar la variable "innodb_directory"

Detener servicio, modificar varible, rehabilitar servicio.

My.ini

```SQL
SET GLOBAL innodb_(name_var) = 'new_path';
```

Entonces el nuevo path debería tener:

Directorio del mismo nombre de la DB y dentro:

*.ibd

## Undo tablespaces

Son undo logs.

Hacen por default (en data) 2 archivos logs.

variable del directorio:
"innodb_undo_directory".

```SQL
CREATE UNDO TABLESPACE UNDO_0010 ADD DATAFILE 'UNDO_010.IBU';
```

Archivos resultantes (partición):
(CREARLA tabla en otra partinción (innodb))

* W:/empployees
* nueva_tabla.ibd

Archivos resultantes(nuevo disco):
(PASAR tabla a otrp disco duro (innodb))

* Disco nuevo/bds
* empployees
* titles.ibd
* undo_003.ibu

Revisión Martes 19, 2019

Para el Miércoles 19, 2019

## File groups (equivalente a tablespaces)

Crear nuevo grupo de archivos para crear más archivos.

Ejemplo:

* mdf
* ldf
* ndf
* ndf
* ndf

Lo anterior se divide en 3 y toda la base de datos se reparten entre todos los
archivos \*.ndf

Por defecto, si no se indica en donde se creará un a tabla, se almacenará en
el archivos \*.mdf.

Recomendable:
Tener varios grupos de archivos para las DBs.

1. Crear la DB MultipleFileGroups
Añade un FileGroup secundario.


2. Crear una tabla llamada customers.

3. Cambiar el FileGroup por default.

4. Crear una tabla llamanda test.

5. Checar que esté funcionando (hacer inserts).

NOTA: Los 5 pasos anteriores se encuentran en el link. (mejor descritos)

Usar el offline para el **paso 9**.

6. Muva toda la DB a un nuevo disco de 2GB de capacidad.

7. Investigue cómo agregar un nuevo archivo al FileGroup llamado MultipleFileGroups3.pdf

8. Agregue 1000 registros en la tabla Customers y muestre cómo SQL Server esparce
los datos entre los 3 archivos \*.ndf.

9. Investigue  cómo mover MultipleFileGroups3 al RAID1 implementado anteriormente.

10. Agregue 1000 registros en la tabla Customers y muestre cómo SQL Server esparce
los datos entre los 3 archivos \*.ndf.
