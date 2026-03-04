<h2>Registrar Vehículo</h2>

<form method="post" action="/vehiculos/store">

    <h3>Datos del Cliente</h3>

    <label>Nombres</label>
    <input type="text"
           name="nombres"
           maxlength="50"
           pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+"
           required>

    <label>Apellidos</label>
    <input type="text"
           name="apellidos"
           maxlength="50"
           pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+"
           required>

    <label>Documento</label>
    <input type="text"
           name="documento"
           maxlength="8"
           minlength="8"
           pattern="[0-9]{8}"
           required>

    <label>Correo</label>
    <input type="email" name="correo" maxlength="150" required>

    <label>Teléfono</label>
    <input type="text" name="telefono" maxlength="20" pattern="[0-9+ ]+">

    <h3>Datos del Vehículo</h3>

    <label>Placa</label>
    <input type="text"
           name="placa"
           maxlength="7"
           pattern="[A-Za-z0-9]+"
           required>

    <label>Marca</label>
    <input type="text"
           name="marca"
           maxlength="40"
           pattern="[A-Za-z ]+"
           required>

    <label>Modelo</label>
    <input type="text"
           name="modelo"
           maxlength="40"
           pattern="[A-Za-z0-9 ]+"
           required>

    <label>Año de fabricación</label>
    <input type="number"
           name="anio_fabricacion"
           min="1950"
           max="2032"
           required>

    <br><br>

    <button type="submit">Guardar</button>

</form>
<?php if(!empty($errors)): ?>

    <div class="errores">

        <ul>

            <?php foreach($errors as $error): ?>

                <li><?= htmlspecialchars($error) ?></li>

            <?php endforeach; ?>

        </ul>

    </div>

<?php endif; ?>