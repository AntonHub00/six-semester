CREATE TRIGGER ON Persona
FOR INSERT
BEGIN
	DECLARE @id INTEGER;

	SELECT @id = id FROM inserted;
	UPDATE Person SET Fecha_Alta = getdate() WHERE id = @id;

	INSERT INTO Edo_de_Cuenta values(@id, 0, getdate());
END;


CREATE TRIGGER ON Transaccion
FOR INSERT
BEGIN
	DECLARE @mv INTEGER CHAR, @saldo FLOAT, @id INTEGER;

	SELECT @mv = Tipo_Tran, @n_saldo = monto, @id = id FROM inserted;

	IF @mv == 'D'
	(
		UPDATE Edo_de_Cuenta SET saldo = saldo + @n_saldo,
		Fecha_Ult_Movto = getdate() WHERE id = @id;
	)
	ELSE
	(
		IF @n_saldo <= (SELECT saldo FROM Edo_de_Cuenta WHERE id = @id)
		(
			UPDATE Edo_de_Cuenta SET saldo = saldo - @n_saldo,
			Fecha_Ult_Movto = getdate() WHERE id = @id;
		)
		ELSE
		(
			SELECT 'Saldo no disponible';
		)
	)
END;
