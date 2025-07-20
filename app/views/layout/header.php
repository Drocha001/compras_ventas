<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión Compras y Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Sistema Gestión</a>
        <?php if (!empty($_SESSION['user'])): ?>
        <span class="text-white me-2">Usuario: <?= htmlspecialchars($_SESSION['user']['nombre']) ?> (<?= htmlspecialchars($_SESSION['user']['rol']) ?>)</span>
        <a href="index.php?controller=auth&action=logout" class="btn btn-light btn-sm">Salir</a>
        <?php endif; ?>
    </div>
</nav>
<div class="container mt-4">