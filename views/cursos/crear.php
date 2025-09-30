<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Curso - Marketplace de Cursos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-lg">
        <!-- Encabezado -->
        <h1 class="text-3xl font-bold text-center text-indigo-700 mb-6">
            ✨ Crear Nuevo Curso
        </h1>

        <!-- Mensajes de error -->
        <?php if (!empty($errores ?? [])): ?>
            <div class="mb-4">
                <?php foreach ($errores as $error): ?>
                    <div class="bg-red-100 text-red-700 border border-red-300 rounded-lg px-4 py-2 mb-2 text-sm">
                        ⚠️ <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form action="/cursos/crear" method="POST" enctype="multipart/form-data" class="space-y-5">

            <!-- Título -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Título del Curso</label>
                <input type="text" name="curso[titulo]" required 
                       value="<?= htmlspecialchars($curso->titulo ?? '', ENT_QUOTES, 'UTF-8') ?>" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
            </div>

            <!-- Descripción -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Descripción</label>
                <textarea name="curso[descripcion]" rows="4" required 
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"><?= htmlspecialchars($curso->descripcion ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>

            <!-- Precio -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Precio (Bs)</label>
                <input type="number" name="curso[precio]" step="0.01" min="0" required
                       value="<?= htmlspecialchars($curso->precio ?? '', ENT_QUOTES, 'UTF-8') ?>" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
            </div>

            <!-- Duración -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Duración (horas)</label>
                <input type="number" name="curso[duracion]" min="1" required
                       value="<?= htmlspecialchars($curso->duracion ?? '', ENT_QUOTES, 'UTF-8') ?>" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
            </div>

            <!-- Imagen -->
            <div>
                <label class="block mb-1 font-medium text-gray-700">Imagen del Curso</label>
                <input type="file" name="curso[imagen]" accept="image/*"
                       class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 text-sm text-gray-600">
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center pt-4">
                <a href="/cursos" 
                   class="text-gray-600 hover:text-gray-800 text-sm font-medium">
                    ⬅ Volver al listado
                </a>
                <button type="submit" 
                        class="px-5 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-500 transition">
                    💾 Guardar Curso
                </button>
            </div>
        </form>
    </div>

</body>
</html>
