<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Marketplace de Cursos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow rounded p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Iniciar Sesión</h1>

        <!-- Errores -->
        <?php if (!empty($errores ?? [])): ?>
            <div class="mb-4">
                <?php foreach ($errores as $error): ?>
                    <div class="bg-red-100 text-red-700 border border-red-400 rounded p-2 mb-2">
                        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="/login" method="POST" class="grid gap-4">
            <div>
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" required 
                       value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>" 
                       class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 font-medium">Contraseña</label>
                <input type="password" name="password" required 
                       class="w-full border rounded px-3 py-2">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Iniciar Sesión
            </button>
        </form>

        <p class="mt-4 text-center">
            ¿No tienes cuenta? <a href="/usuarios/crear" class="text-blue-600 hover:underline">Regístrate</a>
        </p>
    </div>

</body>
</html>
