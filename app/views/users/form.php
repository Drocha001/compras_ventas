<?php
$isEdit = isset($user);
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2><?= $isEdit ? 'Editar Usuario' : 'Nuevo Usuario' ?></h2>
        <form method="post" autocomplete="off">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="<?= $isEdit ? htmlspecialchars($user['nombre']) : '' ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required value="<?= $isEdit ? htmlspecialchars($user['email']) : '' ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Rol</label>
                <select name="rol" class="form-select" required>
                    <?php
                    $roles = ['admin' => 'Administrador', 'comprador' => 'Compras', 'vendedor' => 'Ventas', 'logistica' => 'Logística', 'finanzas' => 'Finanzas'];
                    $selectedRol = $isEdit ? $user['rol'] : '';
                    foreach ($roles as $r => $label) {
                        $selected = ($selectedRol == $r) ? 'selected' : '';
                        echo "<option value=\"$r\" $selected>$label</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña <?= $isEdit ? '(dejar vacío para no cambiar)' : '' ?></label>
                <input type="password" name="password" class="form-control" <?= $isEdit ? '' : 'required' ?>>
            </div>
            <?php if ($isEdit): ?>
            <div class="mb-3 form-check">
                <input type="checkbox" name="activo" class="form-check-input" id="activo" <?= $user['activo'] ? 'checked' : '' ?>>
                <label class="form-check-label" for="activo">Activo</label>
            </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Actualizar' : 'Crear' ?></button>
            <a href="index.php?controller=user&action=index" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</div>