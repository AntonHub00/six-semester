# MySQL

## Ventajas

* Está disponible de forma gratuita.
* Ofrece mucha funcionalidad a pesar de ser un SGBD libre.
* Hay muchas interfaces de usuario que pueden ser implementadas.
* Puede trabajar con otras bases de datos com DB2 (IMB) u Oracle.

## Desventajas

* Puede que se gaste demasiado tiempo y esfuerzo configurando cosas que otros
SGBD hacen automáticamente. Por ejemplo: crear backups incrementales.
* No hay soporte nativo para XML u OLAP.
* Hay soporte para la versión gratuita, pero se tiene que pagar con este.

## Proceso de instalación

El proceso de instalación es muy sencillo.

### Windows

En windows basta con seguir el archivo .exe de instalación, sin embargo, por
alguna razón no queda totalmente instalado. Para completar la instalación se
tiene que ir a la ruta donde se "instaló" MySQL y ejecutar el instalador, de esta
forma, se completará la descarga de las dependecias necesarias para correr el
servidor.

La configuración se hace a través de una GUI y son pasos sencillos como
configuración de contraseña de administrador, permisos de conexión remota, entre
otros.

### Linux (Ubuntu)

En Ubuntu es aún más fácil ya que se cuenta con el paquete en los repositorios:
`sudo apt install mysql-server ` es suficiente para descargar todo lo necesario.

A diferencia de Windows, cuando la instalación haya terminado, se deberá ejecutar
`sudo mysql_secure_installation` para hacer la misma configuración que sale por
defecto en Windows, de esta forma, estaría listo para usarse.

## SQL Server

## Ventajas

* Es muy rápido y estable.
* El motor del gestor ofrece la habilidad de ajustar y llevar un seguimiento
del rendimiento, lo cual puede reducir el uso de recursos.
* Eres capaz de acceder a virtualizaciones en dispositivos móbiles.
* Funciona muy bien con otros productos de Microsoft.

## Desventajas

* El precio de la versión Enterprice está más allá de lo que muchas organizaciones
pueden pagar.
* Incluso optimizando el rendimiento, SQL Server puede consumir demasiados
recursos.
* Muchas personas tiene inconvenientes al usar los servicios de integración de
SQL Server para importar archivos.

## Proceso de instalación

El proceso de instalación es complicado.

Primero tiene una importante dependencia con Windows Server, ya que es donde
SQL Server de desempeña mejor. Entonces primero se tendría que instalar el
sistema operativo (Windows Server) para poder iniciar la instalación de
SQL Server.

La instalación es algo confusa y poco intuitiva para alguien que no
está capacitado o que no ha usado anteriormente SQL Server.

La instalación necesita muchas dependencias muy pesadas como son Visual Studio
o NET y otras menos pesadas pero aún obligatorias como Java o Python.

La instalación es larga debido a esta dependencias y aún así no fuimos capaces
de hacer funcionar cosas como la importación de archivos de Excel.

## Oracle

## Ventajas

* Puedes encontrar las últimas innovaciones y características provenientes de
sus productos debido a que Oracle tiende a establecer el estándar para otras
herramientas de administración de bases de datos.
* Las herramientas de administración de bases de datos de Oracle son muy
robustas y puedes encontrar una para cualquier cosas que te imagines o necesites.

## Desventajas

* El precio de Oracle es tan elevado que solo muy pocas organizaciones pueden
pagarlo.
* El sistema podría requerir una gran cantidad de recursos una vez que está
instalado, así que se necesita un hardware potente si se desea implementar
este SGDB.

## Proceso de instalación

Desconocido por el equipo.

## PostgreSQL

## Ventajas

* Este SGBD es escalable y puede manejar terabytes de datos sin problemas.
* Soporta JSON.
* Hay una gran variedad de funciones predefinidas.
* Hay una buena cantidad de interfaces disponibles.

## Desventajas

* La documentación puede ser algo deficiente por lo que las personas suelen
buscar lo que desean hacer en internet.
* La configuración puede ser algo confusa.
* La velocidad se puede ver comprometida cuando hay una larga serie de operaciones
a realizar o muchas queries.

## Proceso de instalación

Desconocido por el equipo.

# Referencias

[1] "The Pros and Cons of 8 Popular Databases". [online] Available at: https://www.keycdn.com/blog/popular-databases [Accessed 14 Mar. 2019].
