DECLARE @contador INT;

--sucursal centro
SET @contador=0;

WHILE(@contador<=50000)
BEGIN
    EXEC insertar_transaccion @id_persona = 1, @monto = 300, @empleado = 12, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 7, @monto = 300, @empleado = 12, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 13, @monto = 300, @empleado = 12, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 19, @monto = 300, @empleado = 12, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 25, @monto = 300, @empleado = 12, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 31, @monto = 300, @empleado = 12, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 37, @monto = 300, @empleado = 12, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 43, @monto = 300, @empleado = 12, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 49, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 55, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 61, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 67, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 73, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 79, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 85, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 91, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 97, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 85, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 91, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 97, @monto = 200, @empleado = 12, @tipo_cue = 2, @operacion = 1;
    SET @contador=@contador+20;
END


--sucursal acueducto
SET @contador=0;

WHILE(@contador<=50000)
BEGIN
    EXEC insertar_transaccion @id_persona = 2, @monto = 300, @empleado = 15, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 8, @monto = 300, @empleado = 15, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 14, @monto = 300, @empleado = 15, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 20, @monto = 300, @empleado = 15, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 26, @monto = 300, @empleado = 15, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 32, @monto = 300, @empleado = 15, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 38, @monto = 300, @empleado = 15, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 44, @monto = 300, @empleado = 15, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 50, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 56, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 62, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 68, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 74, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 80, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 86, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 92, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 98, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 86, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 92, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 98, @monto = 200, @empleado = 15, @tipo_cue = 2, @operacion = 1;
    SET @contador=@contador+20;
END


--sucursal pipila
SET @contador=0;

WHILE(@contador<=20000)
BEGIN
    EXEC insertar_transaccion @id_persona = 3, @monto = 300, @empleado = 5, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 9, @monto = 300, @empleado = 5, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 15, @monto = 300, @empleado = 5, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 3, @monto = 300, @empleado = 5, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 9, @monto = 300, @empleado = 5, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 15, @monto = 300, @empleado = 5, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 21, @monto = 300, @empleado = 5, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 27, @monto = 300, @empleado = 5, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 33, @monto = 300, @empleado = 5, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 39, @monto = 300, @empleado = 5, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 45, @monto = 300, @empleado = 5, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 51, @monto = 200, @empleado = 5, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 57, @monto = 200, @empleado = 5, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 63, @monto = 200, @empleado = 5, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 69, @monto = 200, @empleado = 5, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 75, @monto = 200, @empleado = 5, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 81, @monto = 200, @empleado = 5, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 87, @monto = 200, @empleado = 5, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 93, @monto = 200, @empleado = 5, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 99, @monto = 200, @empleado = 5, @tipo_cue = 2, @operacion = 1;
    SET @contador=@contador+20;
END


--sucursal camelinas
SET @contador=0;

WHILE(@contador<=10000)
BEGIN
    EXEC insertar_transaccion @id_persona = 4, @monto = 300, @empleado = 48, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 10, @monto = 300, @empleado = 48, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 16, @monto = 300, @empleado = 48, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 4, @monto = 300, @empleado = 48, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 10, @monto = 300, @empleado = 48, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 16, @monto = 300, @empleado = 48, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 22, @monto = 300, @empleado = 48, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 28, @monto = 300, @empleado = 48, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 34, @monto = 300, @empleado = 48, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 40, @monto = 300, @empleado = 48, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 46, @monto = 300, @empleado = 48, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 52, @monto = 200, @empleado = 48, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 58, @monto = 200, @empleado = 48, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 64, @monto = 200, @empleado = 48, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 70, @monto = 200, @empleado = 48, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 76, @monto = 200, @empleado = 48, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 82, @monto = 200, @empleado = 48, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 88, @monto = 200, @empleado = 48, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 94, @monto = 200, @empleado = 48, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 100, @monto = 200, @empleado = 48, @tipo_cue = 2, @operacion = 1;
    SET @contador=@contador+20;
END


--sucursal americas
SET @contador=0;

WHILE(@contador<=10000)
BEGIN
    EXEC insertar_transaccion @id_persona = 5, @monto = 300, @empleado = 17, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 11, @monto = 300, @empleado = 17, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 17, @monto = 300, @empleado = 17, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 5, @monto = 300, @empleado = 17, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 11, @monto = 300, @empleado = 17, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 17, @monto = 300, @empleado = 17, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 23, @monto = 300, @empleado = 17, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 29, @monto = 300, @empleado = 17, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 35, @monto = 300, @empleado = 17, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 41, @monto = 300, @empleado = 17, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 47, @monto = 300, @empleado = 17, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 53, @monto = 200, @empleado = 17, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 59, @monto = 200, @empleado = 17, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 65, @monto = 200, @empleado = 17, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 71, @monto = 200, @empleado = 17, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 77, @monto = 200, @empleado = 17, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 83, @monto = 200, @empleado = 17, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 89, @monto = 200, @empleado = 17, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 95, @monto = 200, @empleado = 17, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 95, @monto = 200, @empleado = 17, @tipo_cue = 2, @operacion = 1;
    SET @contador=@contador+20;
END


--sucursal tecnologico
SET @contador=0;

WHILE(@contador<=5000)
BEGIN
    EXEC insertar_transaccion @id_persona = 6, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 12, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 18, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 24, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 6, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 12, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 18, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 24, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 30, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 36, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 42, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 48, @monto = 300, @empleado = 78, @tipo_cue = 1, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 54, @monto = 200, @empleado = 78, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 60, @monto = 200, @empleado = 78, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 66, @monto = 200, @empleado = 78, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 72, @monto = 200, @empleado = 78, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 78, @monto = 200, @empleado = 78, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 84, @monto = 200, @empleado = 78, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 90, @monto = 200, @empleado = 78, @tipo_cue = 2, @operacion = 1;
    EXEC insertar_transaccion @id_persona = 96, @monto = 200, @empleado = 78, @tipo_cue = 2, @operacion = 1;
    SET @contador=@contador+20;
END
