<div class="max-w-lg mx-auto mt-8 bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-6 text-center">Registrar Usuario</h1>

    <!-- Mensajes de error -->
    <?php if (!empty($errores ?? [])): ?>
        <div class="mb-4">
            <?php foreach ($errores as $error): ?>
                <div class="bg-red-100 text-red-700 border border-red-400 rounded p-2 mb-2">
                    <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="/usuarios/crear" method="POST" class="grid gap-4">
        <!-- Nombre -->
        <div>
            <label class="block mb-1 font-medium">Nombre</label>
            <input type="text" name="usuario[nombre]" required
                   value="<?= htmlspecialchars($usuario->nombre ?? '', ENT_QUOTES, 'UTF-8') ?>"
                   class="w-full border rounded px-3 py-2">
        </div>

        <!-- Email -->
        <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="usuario[email]" required
                   value="<?= htmlspecialchars($usuario->email ?? '', ENT_QUOTES, 'UTF-8') ?>"
                   class="w-full border rounded px-3 py-2">
        </div>

        <!-- Contraseña -->
        <div>
            <label class="block mb-1 font-medium">Contraseña</label>
            <input type="password" name="usuario[password]" required
                   class="w-full border rounded px-3 py-2">
        </div>

        <!-- Teléfono -->
        <div>
            <label class="block mb-1 font-medium">Teléfono (WhatsApp)</label>
            <input type="tel" name="usuario[telefono]" required
                   value="<?= htmlspecialchars($usuario->telefono ?? '', ENT_QUOTES, 'UTF-8') ?>"
                   class="w-full border rounded px-3 py-2" placeholder="Ej: 59165811117">
        </div>

        <!-- Rol -->
        <div>
            <label class="block mb-1 font-medium">Rol</label>
            <select name="usuario[rol]" required class="w-full border rounded px-3 py-2">
                <option value="">-- Selecciona un rol --</option>
                <option value="estudiante" <?= isset($usuario->rol) && $usuario->rol === 'estudiante' ? 'selected' : '' ?>>Estudiante</option>
                <option value="instructor" <?= isset($usuario->rol) && $usuario->rol === 'instructor' ? 'selected' : '' ?>>Instructor</option>
            </select>
        </div>

        <!-- Botón de registrar -->
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Registrar
        </button>
    </form>
</div>
