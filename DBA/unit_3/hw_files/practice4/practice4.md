# Práctica 4

## Primera parte

![Creación y permisos dados a usuario anton \label{init}](practica4_1.png)

Lo primero es crear el usuario anton con contraseña "Password_123".

A este usuario se le otorgaron 4 permisos:

1. Cantidad máxima de queries por hora (200).
1. Cantidad máxima de "updates" por hora (100).
1. Cantidad máxima de conexiones por hora (50).
1. Cantidad máxima de conexiones simultáneas (50).

El primer permiso (queries por hora) define la cantidad máxima de queries por
hora, entendiéndose como queries cualquier consulta a la base de datos, es
decir, "select", "update", "delete", "create", etc.

El segundo permiso ("updates" por hora) indica precisamente eso; número de
queries "update" que tiene permitidos en una hora.

El tercer permiso (conexiones por hora) se refiere a la cantidad de veces que
dicho usuario se puede conectar y desconectar a la DB.

Por último, en el cuarto permiso (cantidad máxima de conexiones) se indica la
cantidad de conexiones simultáneas con la DB. Ejemplo de esto podría ser: estar
conectado a través de varias terminales, en algún programa como phpMyAdmin o
MySQL Workbench, etc., al mismo tiempo.

Cabe aclarar que cada que se los permisos negaran alguna acción al usuario
"anton", se tuvo que realizar un flush de los privilegios de los usuarios, como
se muestra en la línea 13 de la figura \ref{init}. De esta manera no se tendría
que esperar a que los permisos se restablecieran después de una hora y así
poder continuar con la práctica.

### Cantidad máxima de queries por hora

![Cantidad máxima de queries por hora \label{queries}](practica4_5.png)

Como se muestra en la figura \ref{queries}, la base de datos solo permitió un total
de 32 queries de los cuales una es un "use" y los restantes un simple "select".

### Cantidad máxima de "updates" por hora

![Cantidad máxima de "updates" por hora \label{updates}](practica4_4.png)

Como se puede obsevar en la figura \ref{updates}, la base de datos sí permitió los
100 updates, sin contar que la queries 1 fue un "use".

### Cantidad máxima de conexiones por hora

![Cantidad máxima de conexiones por hora \label{conHora}](practica4_3_\(6\).png)

En esta parte se hizo un conexión-desconexión un total de 6 veces antes de que
se mostrara el error que aparece en la figura \ref{conHora}. Este erro indica
que la cantidad máxima de queries se ha agotado.

### Cantidad máxima de conexiones simultáneas

![Cantidad máxima de conexiones simultáneas \label{simul}](practica4_2.png)

La conexión de la base de datos solo permitió 5 conexiones simultáneas antes
de arrojar un error al sexto intento. Las conexiones simultánes se pueden
observar a manera de tabs en la parte superior de la figura \ref{simul}.

### Conclusión de la primera parte

Prácticamente ninguno de los permisos se cumplieron como se especificaron al
momento de crear el usuario. Esto se debe a que MySQL Workbench requiere
más conexiones adicionales para que pueda funcionar de manera correcta, sin
embargo, hace uso de conexiones excesivas por lo que no se ve reflejada la
configuración de los permisos, a excepción de los "updates" por hora.

## Segunda parte

### Creación de la base de datos

Lo primero que se realizó fue la creación de una base de datos llamada "app",
con el fin de que pudiese ser utilizada para esta práctica.

### Creación de usuarios

Como se muestra en la figura \ref{createUsers}, fueron creados 3 usuarios:
un usuario llamado "desarrollador" en localhost, un usuario llamado
"administrador" en localhost y otro usuario también llamado "administrador"
pero que puede acceder desde cualquier host.
La contraseña debió ser cambiada ya que las restricciones de contraseña por
defecto de MySQL son más esctrictas, de otro modo arrojaría un error.

![Creación de usuarios para asignar privilegios \label{createUsers}](practica4s_1.png)

### Asignación de privilegios

El siguiente paso fue añadirle privilegios a los usuarios creados en el paso
anterior, por lo que se ejecutaron las queries mostradas en el la figura
\ref{addPrivi}.

Al usuario "administrador" que puede acceder desde cualquier host se le asignaron
todos los privilegios posibles en todas las bases de datos y tablas, al usuario
"administrador" que puede acceder únicamente desde localhost se le asignaron
los permisos RELOAD y PROCESS en todas las tablas de todas las bases de datos y
por último, al usuario "desarrollador" se le asignaron permisos en todas las
tablas de la base de datos "app".

![Asinación de privilegios a los usuarios creados \label{addPrivi}](practica4s_2.png)

### Creación de roles

El siguiente paso fue la creación de 3 roles: "desarrollador", "lectura" y
"escritura", como se muestra en la figura \ref{createRoles}.

![Creación de roles \label{createRoles}](practica4s_3.png)

### Asignación de permisos a roles

Lo siguiente fue asignar los permisos a los roles creados en el paso anterior,
como se muestra en la figura \ref{addPriviRoles}.

Al rol desarrollador se el asignaron permisos en todas las tablas de la base de
datos "app", al rol "lectura" se le asignaron igualmente permisos en todas
las tablas de la base de datos "app" y por último al rol "escritura" se le asignaron
permisos de "insert", "update" y "delete" en todas las tablas de la base de datos
"app".

![Asignación de los permisos a los roles creados \label{addPriviRoles}](practica4s_4.png)


### Creación de nuevos usuarios

Lo siguiente en la práctica fue crear 4 nuevos usuarios los cuales serán usados
para asignarles roles.

Todos los usuarios puede acceder únicamente desde localhost.
Se creó un usuario llamado "desarrollador1", otro llamado "usuario_r1", otro
"usuario_r2" y un último llamado "usuario_wr", como se muestra en la figura
\ref{addNewUsers}.

![Creación de nuevos usuarios para asignarles roles \label{addNewUsers}](practica4s_5.png)

### Asignación de roles a usuarios

El siguente paso fue asignar los roles, ya con privilegios asignados, a los
nuevos usuarios creados anteriormente.

Recordar que todos los nuevos usuarios creados puede acceder solo desde localhost.
Al usuario "desarollador1" se le asignó el rol "desarollador", a los usuarios
"usuario_r1" y "usuario_r2" se les asignaron el rol "lectura" y por último, al
usuario "usuario_rw" se le asignó el rol "escritura". Esto se puede apreciar en
la figura \ref{addRolesToUsers}.

![Asignación de roles a los nuevos usuarios creados \label{addRolesToUsers}](practica4s_6.png)


### Mostrar privilegios y roles de un usuario

También se pueden asignar privilegios a los usuarios (aparte de los roles), sin
embargo, roles y privilegios no pueden ser asignados en la misma sentencia por
lo que, si se desea asginar roles y privilegios a un usuario, se tiene que
realizar por separado. La figura \ref{showPriviUser} muestra la query utilizada
para mostrar tanto los privilegios como los roles asignados a un usuario.

![Mostrar privilegios y roles de un usuario \label{showPriviUser}](practica4s_7.png)

### Mostrar lista detallada de privilegios de un usuario con rol/roles específicos

En el paso anterior no muestra información detallada sobre los privilegios del
usuario de interés, sin embargo, la query mostrada en la figura
\ref{showPriviUserDetail} nos muestra los privilegios que tiene un usuario con
un rol específico.

![Mostrar privilegios y roles de un usuario con un rol específico \label{showPriviUserDetail}](practica4s_8.png)

### REVOKE y la variable @@mandatory_roles

A aquellos usuarios que se encuentren en la variable @@mandatory_roles no se les
pueden revocar los privilegios. En la figura \ref{mandatory} se muestra que
ninguno de los usuarios creados a lo largo de este práctica se encuentran ahí;
a todos los usuarios que hemos creado se les pueden revocar los privilegios.

![Contenido de la variables @@mandatory_roles \label{mandatory}](practica4s_9.png)

### Revocar privilegios a un rol

En la figura \ref{revoking} se muestra como se remueven los privilegios de
"insert", "update" y "delete" en todas las tablas de la base de datos "app" al
rol "escritura".  Esto suele ser útil cuando se necesita remover temporalmente
los permisos a un conjunto de usuarios ya que esta query también afectará a los
usuarios que tengan asignado el rol a revocar.

![Revocar permisos a un rol \label{revoking}](practica4s_10.png)
