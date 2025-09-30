<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Listado de Productos</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
    <h1 class="text-2xl font-bold mb-4">Productos</h1>
    <a href="/producto/crear" class="bg-blue-600 text-white px-4 py-2 rounded">Nuevo Producto</a>

    <table class="table-auto w-full mt-4 border">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Descripcion</th>
                <th class="p-2 border">Precio</th>
                <th class="p-2 border">Stock</th>
                <th class="p-2 border">Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($producto as $p): ?>
                <tr>
                    <td class="border p-2"><?= $p['codigo'] ?></td>
                    <td class="border p-2"><?= $p['descripcion'] ?></td>
                    <td class="border p-2"><?= number_format($p['precio'], 2) ?> Bs</td>
                    <td class="border p-2"><?= number_format($p['stock'], 2) ?></td>
                    <td class="border p-2">
                        <?php if ($p['imagen']): ?>
                            <img src="/img/<?=$p['imagen'] ?>" class="h-16">
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
