<h1 class="text-3xl font-bold mb-6">Checkout</h1>

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Resumen de Compra</h2>
    <ul class="divide-y divide-gray-200 mb-6">
        <?php foreach ($cursos as $curso): ?>
            <li class="py-2 flex justify-between">
                <span><?php echo htmlspecialchars($curso->titulo); ?></span>
                <span>$<?php echo htmlspecialchars($curso->precio); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="text-right font-bold text-lg mb-6">
        Total: $<?php echo htmlspecialchars($total); ?>
    </div>

    <form method="POST" action="/checkout">
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="nombre" name="nombre" required
                   value="<?php echo htmlspecialchars($usuario ? $usuario->nombre : ''); ?>"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" required
                   value="<?php echo htmlspecialchars($usuario ? $usuario->email : ''); ?>"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        <button type="submit" class="w-full bg-green-500 text-white py-3 rounded hover:bg-green-600">Completar Compra</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var button = form.find('button');
            var originalText = button.text();
            button.text('Procesando...').prop('disabled', true);

            $.ajax({
                url: '/checkout',
                type: 'POST',
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Abrir WhatsApp en nueva pestaña
                        window.open(response.whatsapp_url, '_blank');
                        // Redirigir a home o mostrar mensaje
                        window.location.href = '/';
                    } else {
                        alert('Error al procesar la compra');
                    }
                },
                error: function() {
                    alert('Error al enviar la solicitud');
                },
                complete: function() {
                    button.text(originalText).prop('disabled', false);
                }
            });
        });
    });
</script>