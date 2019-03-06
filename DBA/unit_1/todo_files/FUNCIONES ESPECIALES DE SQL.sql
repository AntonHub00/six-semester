-- FUNCIONES
LTRIM(CADENA) 
RTRIM(CADENA) 
UPPER(CADENA) 
CONCAT(CADENA1, CADENA2, CADENAN) 

DATEPART(DATEPART, FECHA)
DECLARE @FECHA DATETIME;
SET @FECHA='2018-05-10';
SELECT @FECHA;
SELECT DATEPART(DAY, @FECHA);

SET DATEFORMAT


SELECT GETDATE();

PERMISSIONS(); 

SELECT OBJECT_ID(52);

EXEC SP_WHO 
SELECT @@SPID
USE PRUEBa;
SELECT * FROM SYSOBJECTS WHERE XTYPE='U';
SELECT * FROM SYSPROCESSES WHERE SPID=52;


declare @var char(1);
declare @num int;
set @var='a';
select @var;
set @num=ascii(@var)+1;
select CHAR(@num);


USE PRUEBA;
IF PERMISSIONS()&2=2  
   CREATE TABLE test_table (col1 INT); 
   
   
use cine;
declare @resul int;
IF PERMISSIONS(OBJECT_ID('CINE.Boleto','U'))&8=8   
begin
	--set @resul=1
	select 'listo'
    --select @resul;
end;
select 'hola'

use prueba; select * from libro;
INSERT INTO LIBRO (AUTOR, TITULO, EDICION, EDITORIAL) 
VALUES ('YO','MI VIDA',1,'QUIEN SABE');
--CHECAR ULTIMOS QUERYS
SELECT deqs.last_execution_time AS [Time], dest.TEXT AS [Query]
FROM sys.dm_exec_query_stats AS deqs
CROSS APPLY sys.dm_exec_sql_text(deqs.sql_handle) AS dest
ORDER BY deqs.last_execution_time DESC

SELECT * FROM SYSPROCESSES;

use cine;
select * from boleto;
select * from sys.dm_exec_query_stats order by last_execution_time;
select * from sys.dm_exec_sql_text;
select * from sys.dm_audit_actions;
select * from sys.dm_exec_sql_text;


