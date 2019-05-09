# Título

* Asignar cuotas específicas de espacios a usuarios de la DB.
* Controlar la disponibilidad de los datos de la base de datos, poniendo fuera
* Realizar copias de seguridad o recuperciones parciales de la DB.
* Reservar espacio para almacenamiento de datos de forma cooperativa entre
distintos dispositivos.

~~~sql
CREATE TABLESPACE: CREATE TABLESPACE;
~~~

En el TABLESPACE SYSTEM no cargar datos de usuario porque; que solamente esté
el diccionario y que en otro tablespace estén los datos de usuario.

El TABLESPACE SYSTEM en ORACLE se llama PL-SQL.


La mayoría de las DBs se almacenan en la memoria secundaria (discos duros,
memorias flash).

#Definición y creación de espacio asignado para cada base de datos

Forma de organizaciones primarias de archivos:

* Archivo secuencial indexado
* RAM y cache
* Secundario (disco duro)

Recuperar datos significa:
Buscar la pista en la que s sitúa el bloque y situar la cabeza lectora del disco
sobre ella (tiempo de búsqueda), hacer girar el disco hasta encontrar el sector
en el que se sitúa el bloque (latencia) transferir los datos a memoria principal
(tiempo de transferencia).

## Consideraciones para el definición de espacio

1. Siulación de transaccionalidad
1. Creación de la DB y consideración de tamaño
1. Tamaños y ubicaciones de archivos data y log

## Segmentos y tablespaces

Existen 5 tipos de segmento:

* De datos
* De índice
* De rollback
* Temporales
* De bootstrap

## Memoria compartida

* Grupo de memorias intermedias
* Tabla de bloqueos
* Memoria intermedia de registros
* Planes de consulta en cache

## Clúster

Almacenamiento compartido (nodos).

## Sistema distribuido (replicación o partición)
not...

## Bases de consulta y testing

## RAID y particiones

Nació porque un persona tenía discos duros obsoletos, entonces quería juntarlos
para poderlos utilizar.

### RAID 0

No es orientada; no es tolerante a fallos.

Repartir el archivo en 2 discos la información.

No es seguro, si un disco dura falla, toda la info se pierde.

Es lento.

### RAID 1

Mirroring

La misma información está en 2 discos diferentes.

Más rápido en lectura pero más lento en escritura.

### RAID 0 + 1

Es una combinación de estos y se necesatian 4 discos duros que se toman por
parejas para que cada pareja forma un raid 0 y que eso se monte en un raid 1.

Tolerante a fallos.

### RAID 1 + 0

Primero se hace el espejo y luego el stripping.

Se ocupan 4 discos.

Ventaja: Es tolerante a fallos.
Desventaja: caro; requiere 4 discos del mismo tamaño.

### RAID 5

Es el arreglo más óptimo, tolerancia a fallos, óptimo en velocidad de escritura
y lectura.

Paridad:

Se requiere al menos 3 discos.

Hay bloques de paridad (no son archivos): permiten recuperar información.

Disco1 01101101
Disco2 10110101
Disco3 00100101

Paridad 11111101

Es una configuración muy usada.

### NAS y SAN

NAS = Almacenamiento que utiliza la red para almacenar. Se comporte la
infraestructura de la red.

SAN = Sistema completo para almacenar datos; utiliza fibra óptica. No se comparte
la infraestructura, tiene una dedidaca.

---

Tablespace forma lógica
