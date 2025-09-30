<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-purple-600 via-pink-600 to-red-600 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="relative max-w-6xl mx-auto px-4 text-center animate-fade-in">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-slide-up">
            Contáctanos
        </h1>
        <p class="text-lg md:text-xl mb-8 opacity-90 animate-slide-up animation-delay-200 max-w-3xl mx-auto">
            ¿Tienes preguntas? ¿Necesitas ayuda? Estamos aquí para ayudarte.
            Envíanos un mensaje y te responderemos lo antes posible.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-up animation-delay-400">
            <a href="#contact-form" class="bg-white text-purple-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 shadow-lg">
                Enviar Mensaje
            </a>
            <a href="#info" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition-all transform hover:scale-105">
                Ver Información
            </a>
        </div>
    </div>
    <!-- Decorative elements -->
    <div class="absolute top-20 left-20 w-20 h-20 bg-white bg-opacity-10 rounded-full animate-float"></div>
    <div class="absolute bottom-20 right-20 w-16 h-16 bg-white bg-opacity-10 rounded-full animate-float animation-delay-1000"></div>
</section>

<!-- Contact Form Section -->
<section class="py-16 bg-white" id="contact-form">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-8 text-white">
                <h2 class="text-3xl font-bold text-center">Envíanos un Mensaje</h2>
                <p class="text-center mt-2 opacity-90">Estamos aquí para ayudarte</p>
            </div>

            <div class="p-8">
                <!-- Mensaje de éxito -->
                <?php if (!empty($exito) && $exito): ?>
                    <div class="mb-6 bg-green-100 text-green-700 border border-green-400 rounded-lg p-4 animate-slide-up">
                        <div class="flex items-center">
                            <span class="text-2xl mr-3">✅</span>
                            <span class="font-semibold">¡Mensaje enviado con éxito!</span>
                        </div>
                        <p class="mt-1">Te responderemos lo antes posible.</p>
                    </div>
                <?php endif; ?>

                <!-- Mensajes de error -->
                <?php if (!empty($errores ?? [])): ?>
                    <div class="mb-6">
                        <?php foreach ($errores as $error): ?>
                            <div class="bg-red-100 text-red-700 border border-red-400 rounded-lg p-4 mb-3 animate-slide-up">
                                <div class="flex items-center">
                                    <span class="text-xl mr-3">⚠️</span>
                                    <span><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form action="/contacto" method="POST" class="grid gap-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="animate-slide-up">
                            <label class="block mb-2 font-semibold text-gray-700">Nombre</label>
                            <input type="text" name="nombre"
                                   value="<?= htmlspecialchars($_POST['nombre'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                   class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                                   required>
                        </div>

                        <div class="animate-slide-up animation-delay-200">
                            <label class="block mb-2 font-semibold text-gray-700">Email</label>
                            <input type="email" name="email"
                                   value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                   class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                                   required>
                        </div>
                    </div>

                    <div class="animate-slide-up animation-delay-400">
                        <label class="block mb-2 font-semibold text-gray-700">Asunto</label>
                        <input type="text" name="asunto"
                               value="<?= htmlspecialchars($_POST['asunto'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                               class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all"
                               required>
                    </div>

                    <div class="animate-slide-up animation-delay-600">
                        <label class="block mb-2 font-semibold text-gray-700">Mensaje</label>
                        <textarea name="mensaje" rows="6"
                                  class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all resize-none"
                                  required><?= htmlspecialchars($_POST['mensaje'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                    </div>

                    <div class="animate-slide-up animation-delay-800">
                        <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 px-6 rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transition-all transform hover:scale-105 shadow-lg">
                            <span class="flex items-center justify-center">
                                <span class="mr-2">📤</span>
                                Enviar Mensaje
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info & Social Media -->
<section class="py-16 bg-gray-50" id="info">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-800 animate-fade-in">Información de Contacto</h2>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Location -->
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2 animate-slide-up text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <span class="text-3xl">📍</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-gray-800">Ubicación</h3>
                <p class="text-gray-600">Tarija, Bolivia</p>
                <p class="text-gray-500 text-sm mt-2">Centro de la ciudad</p>
            </div>

            <!-- Email -->
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2 animate-slide-up animation-delay-200 text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <span class="text-3xl">📧</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-gray-800">Email</h3>
                <p class="text-gray-600">contacto@marketplace.com</p>
                <p class="text-gray-500 text-sm mt-2">Respuesta en 24 horas</p>
            </div>

            <!-- Phone -->
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2 animate-slide-up animation-delay-400 text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <span class="text-3xl">📞</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-gray-800">Teléfono</h3>
                <p class="text-gray-600">+591 123 4567</p>
                <p class="text-gray-500 text-sm mt-2">Lun - Vie: 9:00 - 18:00</p>
            </div>
        </div>

        <!-- Social Media -->
        <div class="mt-16 text-center">
            <h3 class="text-2xl font-bold mb-8 text-gray-800 animate-fade-in">Síguenos en Redes Sociales</h3>
            <div class="flex justify-center gap-6">
                <a href="#" class="bg-blue-600 text-white p-4 rounded-full hover:bg-blue-700 transition-all transform hover:scale-110 shadow-lg animate-slide-up">
                    <span class="text-2xl">📘</span>
                </a>
                <a href="#" class="bg-blue-400 text-white p-4 rounded-full hover:bg-blue-500 transition-all transform hover:scale-110 shadow-lg animate-slide-up animation-delay-200">
                    <span class="text-2xl">🐦</span>
                </a>
                <a href="#" class="bg-pink-600 text-white p-4 rounded-full hover:bg-pink-700 transition-all transform hover:scale-110 shadow-lg animate-slide-up animation-delay-400">
                    <span class="text-2xl">📷</span>
                </a>
                <a href="#" class="bg-red-600 text-white p-4 rounded-full hover:bg-red-700 transition-all transform hover:scale-110 shadow-lg animate-slide-up animation-delay-600">
                    <span class="text-2xl">📺</span>
                </a>
            </div>
            <div class="flex justify-center gap-6 mt-4">
                <span class="text-gray-600 hover:text-blue-600 transition-colors">Facebook</span>
                <span class="text-gray-600 hover:text-blue-400 transition-colors">Twitter</span>
                <span class="text-gray-600 hover:text-pink-600 transition-colors">Instagram</span>
                <span class="text-gray-600 hover:text-red-600 transition-colors">YouTube</span>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-800 animate-fade-in">Preguntas Frecuentes</h2>
        <div class="space-y-6">
            <div class="bg-gray-50 p-6 rounded-xl animate-slide-up">
                <h3 class="text-xl font-semibold mb-3 text-gray-800">¿Cuánto tiempo tardan en responder?</h3>
                <p class="text-gray-600">Nos esforzamos por responder todos los mensajes dentro de 24 horas hábiles.</p>
            </div>
            <div class="bg-gray-50 p-6 rounded-xl animate-slide-up animation-delay-200">
                <h3 class="text-xl font-semibold mb-3 text-gray-800">¿Puedo contactarlos por teléfono?</h3>
                <p class="text-gray-600">Sí, puedes llamarnos de lunes a viernes de 9:00 a 18:00 (hora de Bolivia).</p>
            </div>
            <div class="bg-gray-50 p-6 rounded-xl animate-slide-up animation-delay-400">
                <h3 class="text-xl font-semibold mb-3 text-gray-800">¿Ofrecen soporte técnico?</h3>
                <p class="text-gray-600">Claro, nuestro equipo técnico está disponible para ayudarte con cualquier problema técnico.</p>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.animate-fade-in {
    animation: fadeIn 1s ease-out;
}

.animate-slide-up {
    animation: fadeIn 1s ease-out;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

.animation-delay-200 { animation-delay: 0.2s; }
.animation-delay-400 { animation-delay: 0.4s; }
.animation-delay-600 { animation-delay: 0.6s; }
.animation-delay-800 { animation-delay: 0.8s; }
.animation-delay-1000 { animation-delay: 1s; }
</style>
