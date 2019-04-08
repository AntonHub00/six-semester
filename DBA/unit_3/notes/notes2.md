# 3 Asignación de cuotas de espacio para usuarios

La cuotas se pueden configurar para usuarios individuales o para grupos. Esta
flexibilidad hace posible darle a cada usuario un porción del disco para que
maneje sus archvios (tales como correo o informes), mientras


Darle a cada usuario una cuota (chance de almacenar cierta cantida de info) para
que no ocupe tanto espacio en disco.

## Cuotas

* Cuotas de bloques (espacio)
* Cuota de archivo o inodo (número de archivoso directorios que se pueden crear)

## Tipos de cuotas

* Cuotas blandas (se establece limite pero da una advertencia) (violar temporalmente
la cuota)
* Cuota dura (muy estricta)

Por defecto ningún usuario tiene una cuota.

tablespace ~= filegroup

El valor puede ser menor o mayor que el tamaño del tablespace.

Tablespace del sistema: Guarda índices y cosas del sistema (normalmente no se guarden
aquí los tablespaces)..

**Recomendación**: En los tablespaces SYSAUX Y SYSTEM no dar cuotas (no almacenar cosas
aquí para los usuarios).

## 4 Tablespaces

En un tablespaces lógicos vemos archivos.

Inclusive cuando el almacenamiento es lógico (archivos) tenemos tablespaces que
es una forma de ver el cómo se almacena la información de una forma lógica.

Las tablas por defecto se crean en el SYSTEM tablespace. Es mejor crear un
tablespace de usuario (es lo recomendable).

**CASO MySQL**

Por defecto crea un tablespace por tabla (File-Per-Table).

Se pueden crear tablespaces generales.

**CASO SQL Server**

Todo lo que se crea se va por defecto a FileGroup "PRIMARY"

## 5 Roles

Privilegios en el sisitema y en los objetos del sistema.

A un rol le podemos asignar otros roles.

Múltiples roles a un usuario.

Un rol se pude habilitar o inhabilitar en cualquier momento.

Los roles que son  indirectamente garantizados se pueden  hablitar/inhabilitar
explícitamente.
