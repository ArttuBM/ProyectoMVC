<h1 class="text-3xl font-bold mb-6">Carrito de Compras</h1>

<?php if (empty($cursos)): ?>
    <p class="text-gray-600">Tu carrito está vacío.</p>
    <a href="/cursos" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver Cursos</a>
<?php else: ?>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <ul class="divide-y divide-gray-200">
            <?php foreach ($cursos as $curso): ?>
                <li class="py-4 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold"><?php echo htmlspecialchars($curso->titulo); ?></h3>
                        <p class="text-gray-600">$<?php echo htmlspecialchars($curso->precio); ?></p>
                    </div>
                    <form method="POST" action="/carrito/eliminar" class="inline">
                        <input type="hidden" name="id" value="<?php echo $curso->id; ?>">
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Eliminar</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="mt-6">
            <a href="/checkout" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600">Proceder al Checkout</a>
        </div>
    </div>
<?php endif; ?>