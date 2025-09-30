<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<section class="max-w-7xl mx-auto px-4 py-8" style="max-width: 1200px; margin: auto;">
    <!-- Encabezado -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-indigo-700">🎓 Cursos Disponibles</h1>

        <?php if (!empty($_SESSION['login']) && $_SESSION['usuario_rol'] === 'instructor'): ?>
            <a href="/cursos/crear"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-500 transition">
                + Crear Curso
            </a>
        <?php endif; ?>
    </div>

    <!-- Listado de cursos -->
    <?php if (!empty($cursos)): ?>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3" style="min-width: 300px;">
            <?php foreach ($cursos as $c): ?>
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <!-- Imagen -->
                    <div class="h-40 bg-gray-200 flex items-center justify-center">
                        <?php if (!empty($c['imagen'])): ?>
                            <img src="/img/<?= htmlspecialchars($c['imagen'], ENT_QUOTES, 'UTF-8') ?>"
                                alt="<?= htmlspecialchars($c['titulo'], ENT_QUOTES, 'UTF-8') ?>"
                                class="h-full w-full object-cover">
                        <?php else: ?>
                            <span class="text-gray-500">Sin imagen</span>
                        <?php endif; ?>
                    </div>

                    <!-- Contenido -->
                    <div class="p-5">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">
                            <?= htmlspecialchars($c['titulo'], ENT_QUOTES, 'UTF-8') ?>
                        </h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            <?= htmlspecialchars($c['descripcion'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-indigo-600">
                                <?= number_format($c['precio'] ?? 0, 2) ?> Bs
                            </span>
                            <button type="button" class="agregar-carrito p-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition shadow-md" data-id="<?= htmlspecialchars($c['id'], ENT_QUOTES, 'UTF-8') ?>" title="Agregar al Carrito">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13v8a2 2 0 002 2h10a2 2 0 002-2v-3"></path>
                                </svg>
                            </button>
                            </a>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">
                            Duración: <?= htmlspecialchars($c['duracion'] ?? 0) ?> horas
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-gray-500 text-center text-lg">
            No hay cursos disponibles en este momento.
        </p>
    <?php endif; ?>
</section>

</body>

</html>