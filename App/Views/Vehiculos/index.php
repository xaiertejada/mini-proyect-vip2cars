<h1>Gestión de Vehículos</h1>

<a href="/vehiculos/create">Registrar Vehículo</a>

<form method="get" style="margin-top:10px;margin-bottom:20px;">
    <input type="text"
           name="buscar"
           placeholder="Buscar por placa o documento"
           maxlength="20"
           pattern="[A-Za-z0-9\-]+"
           value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">

    <button type="submit">Buscar</button>
</form>

<table border="1" cellpadding="5">

    <thead>
    <tr>
        <th>Placa</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Año</th>
        <th>Cliente</th>
        <th>Documento</th>
        <th>Acciones</th>
    </tr>
    </thead>

    <tbody>

    <?php if(!empty($vehiculos)): ?>

        <?php foreach ($vehiculos as $v): ?>

            <tr>

                <td><?php echo htmlspecialchars($v['placa']); ?></td>
                <td><?php echo htmlspecialchars($v['marca']); ?></td>
                <td><?php echo htmlspecialchars($v['modelo']); ?></td>
                <td><?php echo htmlspecialchars($v['anio_fabricacion']); ?></td>
                <td><?php echo htmlspecialchars($v['nombres'].' '.$v['apellidos']); ?></td>
                <td><?php echo htmlspecialchars($v['documento']); ?></td>

                <td>

                    <a href="/vehiculos/edit/<?php echo htmlspecialchars($v['id']); ?>">Editar</a>

                    <form method="post"
                          action="/vehiculos/delete/<?php echo htmlspecialchars($v['id']); ?>"
                          style="display:inline;"
                          onsubmit="return confirm('¿Seguro que desea eliminar este vehículo?');">

                        <button type="submit">Eliminar</button>

                    </form>

                </td>

            </tr>

        <?php endforeach; ?>

    <?php else: ?>

        <tr>
            <td colspan="7" style="text-align:center;">
                No hay vehículos registrados
            </td>
        </tr>

    <?php endif; ?>

    </tbody>

</table>

<?php if(isset($totalPaginas) && $totalPaginas > 1): ?>

    <div class="paginacion" style="margin-top:20px;">

        <?php if($pagina > 1): ?>
            <a href="?page=<?php echo $pagina - 1; ?>">Anterior</a>
        <?php endif; ?>

        <?php for($i = 1; $i <= $totalPaginas; $i++): ?>

            <a href="?page=<?php echo $i; ?>"
               style="<?php echo ($i == $pagina) ? 'font-weight:bold;' : ''; ?>">
                <?php echo $i; ?>
            </a>

        <?php endfor; ?>

        <?php if($pagina < $totalPaginas): ?>
            <a href="?page=<?php echo $pagina + 1; ?>">Siguiente</a>
        <?php endif; ?>

    </div>

<?php endif; ?>