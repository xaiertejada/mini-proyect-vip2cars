<h2>Editar Vehículo</h2>

<?php if(!empty($errors)): ?>
    <div class="errores">
        <ul>
            <?php foreach($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="/vehiculos/update/<?php echo htmlspecialchars($vehiculo['id']); ?>" novalidate>

    <h3>Datos del Cliente</h3>

    <label>Nombres</label>
    <input type="text"
           name="nombres"
           maxlength="40"
           minlength="2"
           pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,40}$"
           required
           value="<?php echo htmlspecialchars($vehiculo['nombres']); ?>">

    <label>Apellidos</label>
    <input type="text"
           name="apellidos"
           maxlength="40"
           minlength="2"
           pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,40}$"
           required
           value="<?php echo htmlspecialchars($vehiculo['apellidos']); ?>">

    <label>Documento</label>
    <input type="text"
           name="documento"
           maxlength="8"
           minlength="8"
           pattern="^[0-9]{8}$"
           required
           value="<?php echo htmlspecialchars($vehiculo['documento']); ?>">

    <label>Correo</label>
    <input type="email"
           name="correo"
           maxlength="120"
           required
           value="<?php echo htmlspecialchars($vehiculo['correo']); ?>">

    <label>Teléfono</label>
    <input type="text"
           name="telefono"
           maxlength="15"
           pattern="^[0-9+ ]{7,15}$"
           value="<?php echo htmlspecialchars($vehiculo['telefono']); ?>">

    <h3>Datos del Vehículo</h3>

    <label>Placa</label>
    <input type="text"
           name="placa"
           maxlength="7"
           minlength="5"
           pattern="^[A-Za-z0-9]{5,7}$"
           required
           value="<?php echo htmlspecialchars($vehiculo['placa']); ?>">

    <label>Marca</label>
    <input type="text"
           name="marca"
           maxlength="30"
           pattern="^[A-Za-z ]{2,30}$"
           required
           value="<?php echo htmlspecialchars($vehiculo['marca']); ?>">

    <label>Modelo</label>
    <input type="text"
           name="modelo"
           maxlength="30"
           pattern="^[A-Za-z0-9 ]{1,30}$"
           required
           value="<?php echo htmlspecialchars($vehiculo['modelo']); ?>">

    <label>Año de fabricación</label>
    <input type="number"
           name="anio_fabricacion"
           min="1950"
           max="<?php echo date('Y'); ?>"
           required
           value="<?php echo htmlspecialchars($vehiculo['anio_fabricacion']); ?>">

    <br><br>

    <button type="submit">Actualizar</button>
    <a href="/">Cancelar</a>

</form>

<script>
    /* Limpieza en tiempo real para evitar caracteres inválidos */
    document.querySelector('input[name="nombres"]').addEventListener('input', function(){
        this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ ]/g,'');
    });

    document.querySelector('input[name="apellidos"]').addEventListener('input', function(){
        this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ ]/g,'');
    });

    document.querySelector('input[name="documento"]').addEventListener('input', function(){
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    document.querySelector('input[name="placa"]').addEventListener('input', function(){
        this.value = this.value.toUpperCase().replace(/[^A-Z0-9]/g,'');
    });

    document.querySelector('input[name="marca"]').addEventListener('input', function(){
        this.value = this.value.replace(/[^A-Za-z ]/g,'');
    });
</script>