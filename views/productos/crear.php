<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
        <div>
            <label class="block font-medium">Descripción</label>
            <input type="text" name="producto[descripcion]" class="w-full border rounded px-3 py-2" value="<?= $producto->descripcion ?? '' ?>" required>
        </div>
        <div>
            <label class="block font-medium">Precio</label>
            <input type="number" name="producto[precio]" class="w-full border rounded px-3 py-2" value="<?= $producto->precio ?? '' ?>" step="0.01" required>
        </div>
        <div>
            <label class="block font-medium">Stock</label>
            <input type="number" name="producto[stock]" class="w-full border rounded px-3 py-2" value="<?= $producto->stock ?? '' ?>" min="0" required>
        </div>
        <div>
            <label class="block font-medium">Imagen</label>
            <input type="file" name="producto[imagen]" class="w-full border rounded px-3 py-2" accept="image/*">
        </div>
        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Guardar</button>
        </div>
    </form>
</body>
</html>