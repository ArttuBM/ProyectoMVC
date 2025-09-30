<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-green-600 via-teal-600 to-blue-700 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="relative max-w-6xl mx-auto px-4 text-center animate-fade-in">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-slide-up">
            Nuestros Servicios
        </h1>
        <p class="text-lg md:text-xl mb-8 opacity-90 animate-slide-up animation-delay-200 max-w-3xl mx-auto">
            Ofrecemos una variedad de recursos y funcionalidades para facilitar tu aprendizaje y conexión con profesionales.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-up animation-delay-400">
            <a href="/cursos" class="bg-white text-green-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 shadow-lg">
                Explorar Cursos
            </a>
            <a href="/contacto" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-600 transition-all transform hover:scale-105">
                Solicitar Servicio
            </a>
        </div>
    </div>
    <!-- Decorative elements -->
    <div class="absolute top-20 left-20 w-20 h-20 bg-white bg-opacity-10 rounded-full animate-float"></div>
    <div class="absolute bottom-20 right-20 w-16 h-16 bg-white bg-opacity-10 rounded-full animate-float animation-delay-1000"></div>
</section>

<!-- Servicios Principales -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition-all transform hover:-translate-y-2 animate-slide-up border-t-4 border-blue-500">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <span class="text-2xl">🎓</span>
                </div>
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Cursos Interactivos</h2>
                <p class="text-gray-600">
                    Accede a cursos de programación con ejercicios prácticos y proyectos reales.
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition-all transform hover:-translate-y-2 animate-slide-up animation-delay-200 border-t-4 border-green-500">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4">
                    <span class="text-2xl">💼</span>
                </div>
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Propuestas y Presupuestos</h2>
                <p class="text-gray-600">
                    Publica proyectos y recibe propuestas de profesionales, facilitando la colaboración.
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition-all transform hover:-translate-y-2 animate-slide-up animation-delay-400 border-t-4 border-purple-500">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                    <span class="text-2xl">💬</span>
                </div>
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Chat Interno</h2>
                <p class="text-gray-600">
                    Negocia directamente con instructores o freelancers a través de nuestro chat interno seguro.
                </p>
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
.animation-delay-1000 { animation-delay: 1s; }
</style>
