<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Usuarios</h2>
    <a href="index.php?controller=user&action=create" class="btn btn-success">Nuevo Usuario</a>
</div>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Activo</th>
            <th>Creado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= htmlspecialchars($u['nombre']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td><?= htmlspecialchars($u['rol']) ?></td>
            <td><?= $u['activo'] ? 'Sí' : 'No' ?></td>
            <td><?= $u['creado_en'] ?></td>
            <td>
                <a href="index.php?controller=user&action=edit&id=<?= $u['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                <a href="index.php?controller=user&action=delete&id=<?= $u['id'] ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('¿Está seguro de eliminar este usuario?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>