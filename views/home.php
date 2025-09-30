<!-- Carrusel de imágenes -->
<div class="carousel-container">
    <img src="/img/home/1.jpg" alt="Imagen 1" class="carousel-slide active">
    <img src="/img/home/2.jpg" alt="Imagen 2" class="carousel-slide">
    <img src="/img/home/3.avif" alt="Imagen 3" class="carousel-slide">

    <!-- Botones de navegación -->
    <button class="carousel-button left" onclick="prevSlide()">&#10094;</button>
    <button class="carousel-button right" onclick="nextSlide()">&#10095;</button>

    <div class="carousel-overlay">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 text-white drop-shadow-lg animate-fade-in">
            🚀 Aprende con los Mejores
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-white drop-shadow-lg opacity-90 animate-slide-up animation-delay-200">
            Descubre cursos de alta calidad impartidos por expertos en tecnología
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-up animation-delay-400">
            <a href="/cursos" class="bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 shadow-lg">
                Explorar Cursos
            </a>
            <a href="/nosotros" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-indigo-600 transition-all transform hover:scale-105">
                Conócenos
            </a>
        </div>
    </div>
</div>
</div>

<!-- Texto de bienvenida superpuesto al carrusel -->


<!-- Features Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-800 animate-fade-in">
            ¿Por qué elegirnos?
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2 animate-slide-up">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <span class="text-3xl">🎓</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-center">Expertos Calificados</h3>
                <p class="text-gray-600 text-center">Cursos impartidos por profesionales con años de experiencia en la industria.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2 animate-slide-up animation-delay-200">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <span class="text-3xl">⚡</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-center">Aprendizaje Rápido</h3>
                <p class="text-gray-600 text-center">Contenido estructurado para que aprendas de manera eficiente y práctica.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2 animate-slide-up animation-delay-400">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <span class="text-3xl">🏆</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-center">Certificación</h3>
                <p class="text-gray-600 text-center">Obtén certificados reconocidos al completar tus cursos favoritos.</p>
            </div>
        </div>
    </div>
</section>

<!-- Cursos Destacados -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-800 animate-fade-in">
            Cursos Destacados
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-8 rounded-xl text-white hover:shadow-xl transition-all transform hover:scale-105 animate-slide-up">
                <h3 class="text-2xl font-bold mb-4">Desarrollo Web</h3>
                <p class="mb-6 opacity-90">Aprende HTML, CSS, JavaScript y frameworks modernos.</p>
                <a href="/cursos" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all">
                    Ver Cursos
                </a>
            </div>
            <div class="bg-gradient-to-br from-green-500 to-teal-600 p-8 rounded-xl text-white hover:shadow-xl transition-all transform hover:scale-105 animate-slide-up animation-delay-200">
                <h3 class="text-2xl font-bold mb-4">Programación</h3>
                <p class="mb-6 opacity-90">Domina lenguajes como Python, Java y más.</p>
                <a href="/cursos" class="bg-white text-green-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all">
                    Ver Cursos
                </a>
            </div>
            <div class="bg-gradient-to-br from-orange-500 to-red-600 p-8 rounded-xl text-white hover:shadow-xl transition-all transform hover:scale-105 animate-slide-up animation-delay-400">
                <h3 class="text-2xl font-bold mb-4">Diseño UX/UI</h3>
                <p class="mb-6 opacity-90">Crea interfaces intuitivas y atractivas.</p>
                <a href="/cursos" class="bg-white text-orange-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all">
                    Ver Cursos
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
    <div class="max-w-4xl mx-auto px-4 text-center animate-fade-in">
        <h2 class="text-4xl font-bold mb-6">¡Comienza tu viaje de aprendizaje hoy!</h2>
        <p class="text-xl mb-8 opacity-90">Únete a miles de estudiantes que ya están transformando sus carreras.</p>
        <a href="/usuarios/crear" class="bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 shadow-lg">
            Registrarse Gratis
        </a>
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

/* Carrusel full-width */
.carousel-container {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
}

.carousel-slide {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: opacity 1s ease-in-out;
    opacity: 0;
}

.carousel-slide.active {
    opacity: 1;
}

/* Overlay para texto sobre carrusel */
.carousel-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.4);
    z-index: 5;
}

/* Botones */
.carousel-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0,0,0,0.5);
    color: white;
    padding: 0.5rem 1rem;
    cursor: pointer;
    border-radius: 0.25rem;
    font-size: 1.5rem;
    z-index: 10;
    transition: background-color 0.3s;
}

.carousel-button:hover {
    background-color: rgba(0,0,0,0.7);
}

.carousel-button.left {
    left: 1rem;
}

.carousel-button.right {
    right: 1rem;
}
</style>

<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-slide');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

// Cambio automático cada 5 segundos
setInterval(nextSlide, 5000);
</script>
