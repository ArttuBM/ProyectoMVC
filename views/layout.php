<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace de Cursos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="text-xl md:text-2xl font-bold hover:text-yellow-300 transition-all duration-300 flex items-center">
                        <span class="mr-2">🚀</span>
                        <span class="hidden sm:block">Marketplace de Cursos</span>
                        <span class="sm:hidden">MPC</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10 transition-all duration-300">Inicio</a>
                        <a href="/nosotros" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10 transition-all duration-300">Nosotros</a>
                        <a href="/servicios" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10 transition-all duration-300">Servicios</a>
                        <a href="/contacto" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10 transition-all duration-300">Contacto</a>
                        <a href="/cursos" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10 transition-all duration-300">Cursos</a>
                    </div>
                </div>

                <!-- Right side - Cart & Auth -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Carrito -->
                    <div class="relative">
                        <button id="carrito-btn" class="flex items-center p-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10 transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13v8a2 2 0 002 2h10a2 2 0 002-2v-3"></path>
                            </svg>
                            <span id="carrito-count" class="ml-1 bg-yellow-400 text-black rounded-full px-2 py-1 text-xs font-bold">
                                <?php echo count($_SESSION['carrito'] ?? []); ?>
                            </span>
                        </button>
                        <div id="carrito-dropdown" class="absolute right-0 mt-2 w-80 bg-white text-black rounded-lg shadow-xl hidden z-50 border border-gray-200">
                            <div class="p-4" id="carrito-content">
                                <h3 class="font-bold mb-3 text-gray-800 border-b pb-2">Carrito de Compras</h3>
                                <div id="carrito-items">
                                    <?php
                                    $carrito = $_SESSION['carrito'] ?? [];
                                    if (empty($carrito)): ?>
                                        <div class="text-center py-8">
                                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13v8a2 2 0 002 2h10a2 2 0 002-2v-3"></path>
                                            </svg>
                                            <p class="text-gray-500">El carrito está vacío.</p>
                                        </div>
                                    <?php else:
                                        foreach ($carrito as $id) {
                                            $curso = \Model\Curso::find($id);
                                            if ($curso): ?>
                                                <div class="flex justify-between items-center mb-3 pb-3 border-b border-gray-100 last:border-b-0 last:pb-0 last:mb-0">
                                                    <div class="flex-1">
                                                        <span class="font-medium text-gray-800"><?php echo htmlspecialchars($curso->titulo); ?></span>
                                                        <span class="block text-sm text-green-600 font-semibold">$<?php echo htmlspecialchars($curso->precio); ?></span>
                                                    </div>
                                                    <button type="button" class="eliminar-carrito text-red-500 hover:text-red-700 ml-3 p-1 hover:bg-red-50 rounded transition-colors" data-id="<?php echo $curso->id; ?>">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            <?php endif;
                                        }
                                    endif; ?>
                                </div>
                                <?php if (!empty($carrito)): ?>
                                    <div class="mt-4 pt-3 border-t">
                                        <a href="/checkout" class="block w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center py-3 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 font-semibold">
                                            Ir a Checkout
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Auth Buttons -->
                    <?php if (!empty($_SESSION['login'])): ?>
                        <div class="flex items-center space-x-3">
                            <div class="px-3 py-2 bg-green-500 bg-opacity-20 rounded-lg border border-green-400">
                                <span class="text-sm font-medium">Hola, <?= htmlspecialchars(explode(' ', $_SESSION['usuario'])[0], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                            <a href="/logout" class="p-2 border-2 border-red-400 rounded-lg hover:bg-red-400 hover:text-white transition-all duration-300" title="Cerrar Sesión">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center space-x-3">
                            <a href="/login" class="px-4 py-2 border-2 border-yellow-400 rounded-lg hover:bg-yellow-400 hover:text-black transition-all duration-300 font-semibold text-sm">
                                Iniciar Sesión
                            </a>
                            <a href="/usuarios/crear" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg hover:from-purple-600 hover:to-pink-600 transition-all duration-300 font-semibold text-sm">
                                Registrarse
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md hover:bg-white hover:bg-opacity-10 transition-all duration-300">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path id="mobile-menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path id="mobile-menu-close" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" class="hidden"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-gradient-to-r from-blue-700 to-purple-700 border-t border-white border-opacity-20">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10 transition-all duration-300">Inicio</a>
                <a href="/nosotros" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10 transition-all duration-300">Nosotros</a>
                <a href="/servicios" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10 transition-all duration-300">Servicios</a>
                <a href="/contacto" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10 transition-all duration-300">Contacto</a>
                <a href="/cursos" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10 transition-all duration-300">Cursos</a>
            </div>

            <!-- Mobile Cart & Auth -->
            <div class="px-2 pt-2 pb-3 border-t border-white border-opacity-20">
                <div class="flex items-center justify-between px-3 py-2">
                    <button id="mobile-carrito-btn" class="flex items-center text-base font-medium hover:bg-white hover:bg-opacity-10 px-3 py-2 rounded-md transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13v8a2 2 0 002 2h10a2 2 0 002-2v-3"></path>
                        </svg>
                        <span id="mobile-carrito-count"><?php echo count($_SESSION['carrito'] ?? []); ?></span>
                    </button>
                </div>

                <?php if (!empty($_SESSION['login'])): ?>
                    <div class="px-3 py-2">
                        <div class="text-sm text-green-300 mb-3">Hola, <?= htmlspecialchars(explode(' ', $_SESSION['usuario'])[0], ENT_QUOTES, 'UTF-8') ?></div>
                        <a href="/logout" class="flex items-center justify-center w-full px-3 py-2 border-2 border-red-400 rounded-lg hover:bg-red-400 hover:text-white transition-all duration-300" title="Cerrar Sesión">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Cerrar Sesión
                        </a>
                    </div>
                <?php else: ?>
                    <div class="flex flex-col space-y-2 px-3 py-2">
                        <a href="/login" class="px-3 py-2 border-2 border-yellow-400 rounded-lg hover:bg-yellow-400 hover:text-black transition-all duration-300 font-semibold text-center">
                            Iniciar Sesión
                        </a>
                        <a href="/usuarios/crear" class="px-3 py-2 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg hover:from-purple-600 hover:to-pink-600 transition-all duration-300 font-semibold text-center">
                            Registrarse
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="flex-grow max-w-6xl mx-auto p-6">
        <?php 
        // $contenido viene del render del router
        echo $contenido ?? '';
        ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 text-white">
        <!-- Main Footer Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="space-y-4">
                    <div class="flex items-center">
                        <span class="text-2xl mr-2">🚀</span>
                        <h3 class="text-xl font-bold">Marketplace de Cursos</h3>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        La plataforma líder en educación tecnológica. Conectamos estudiantes con
                        los mejores instructores del mundo para transformar carreras profesionales.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors duration-300">
                            <span class="text-sm">📘</span>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-400 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors duration-300">
                            <span class="text-sm">🐦</span>
                        </a>
                        <a href="#" class="w-10 h-10 bg-pink-600 rounded-full flex items-center justify-center hover:bg-pink-700 transition-colors duration-300">
                            <span class="text-sm">📷</span>
                        </a>
                        <a href="#" class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center hover:bg-red-700 transition-colors duration-300">
                            <span class="text-sm">📺</span>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold">Enlaces Rápidos</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/" class="text-gray-300 hover:text-white transition-colors duration-300">Inicio</a></li>
                        <li><a href="/nosotros" class="text-gray-300 hover:text-white transition-colors duration-300">Sobre Nosotros</a></li>
                        <li><a href="/servicios" class="text-gray-300 hover:text-white transition-colors duration-300">Servicios</a></li>
                        <li><a href="/cursos" class="text-gray-300 hover:text-white transition-colors duration-300">Catálogo de Cursos</a></li>
                        <li><a href="/contacto" class="text-gray-300 hover:text-white transition-colors duration-300">Contacto</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold">Servicios</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/servicios" class="text-gray-300 hover:text-white transition-colors duration-300">Cursos Interactivos</a></li>
                        <li><a href="/servicios" class="text-gray-300 hover:text-white transition-colors duration-300">Proyectos Freelance</a></li>
                        <li><a href="/servicios" class="text-gray-300 hover:text-white transition-colors duration-300">Chat Directo</a></li>
                        <li><a href="/servicios" class="text-gray-300 hover:text-white transition-colors duration-300">Sistema de Calificaciones</a></li>
                        <li><a href="/servicios" class="text-gray-300 hover:text-white transition-colors duration-300">Recursos Adicionales</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold">Contacto</h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-start space-x-3">
                            <span class="text-blue-400 mt-1">📍</span>
                            <div>
                                <p class="text-gray-300">Tarija, Bolivia</p>
                                <p class="text-gray-400 text-xs">Centro de la ciudad</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="text-green-400 mt-1">📧</span>
                            <div>
                                <p class="text-gray-300">contacto@marketplace.com</p>
                                <p class="text-gray-400 text-xs">Respuesta en 24 horas</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="text-purple-400 mt-1">📞</span>
                            <div>
                                <p class="text-gray-300">+591 123 4567</p>
                                <p class="text-gray-400 text-xs">Lun - Vie: 9:00 - 18:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   

        <!-- Bottom Footer -->
        <div class="border-t border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-sm text-gray-400 mb-4 md:mb-0">
                        &copy; <?= date("Y") ?> Marketplace de Cursos. Todos los derechos reservados.
                    </div>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Política de Privacidad</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Términos de Servicio</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Política de Cookies</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mobile menu toggle
            $('#mobile-menu-button').click(function() {
                $('#mobile-menu').toggleClass('hidden');
                $('#mobile-menu-icon').toggleClass('hidden');
                $('#mobile-menu-close').toggleClass('hidden');
            });

            // Close mobile menu when clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('#mobile-menu-button, #mobile-menu').length) {
                    $('#mobile-menu').addClass('hidden');
                    $('#mobile-menu-icon').removeClass('hidden');
                    $('#mobile-menu-close').addClass('hidden');
                }
            });

            // Desktop cart dropdown
            $('#carrito-btn').click(function(e) {
                e.stopPropagation();
                $('#carrito-dropdown').toggleClass('hidden');
            });

            // Close cart dropdown when clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('#carrito-btn, #carrito-dropdown').length) {
                    $('#carrito-dropdown').addClass('hidden');
                }
            });

            // Solo en página de cursos
            if (window.location.pathname === '/cursos') {
                $('.agregar-carrito').click(function() {
                    var button = $(this);
                    var id = button.data('id');
                    var originalHtml = button.html();
                    button.html('<div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div>').prop('disabled', true);

                    $.ajax({
                        url: '/carrito/agregar',
                        type: 'POST',
                        data: { id: id },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#carrito-count, #mobile-carrito-count').text(response.count).addClass('animate-bounce');
                                setTimeout(function() {
                                    $('#carrito-count, #mobile-carrito-count').removeClass('animate-bounce');
                                }, 1000);
                                // Actualizar dropdown
                                $.get('/carrito/dropdown', function(data) {
                                    $('#carrito-content').html(data);
                                });
                                showAlert('¡Curso agregado al carrito!', 'success');
                            } else {
                                showAlert(response.message, 'error');
                            }
                        },
                        error: function() {
                            showAlert('Error al agregar al carrito', 'error');
                        },
                        complete: function() {
                            button.html(originalHtml).prop('disabled', false);
                        }
                    });
                });

                function showAlert(message, type) {
                    var alertClass = type === 'success' ? 'bg-green-500' : 'bg-red-500';
                    var alert = $('<div class="' + alertClass + ' text-white px-4 py-2 rounded fixed top-4 right-4 z-50 shadow-lg">' + message + '</div>');
                    $('body').append(alert);
                    setTimeout(function() {
                        alert.fadeOut(function() {
                            alert.remove();
                        });
                    }, 3000);
                }
            }

            // Eliminar del carrito (en todas las páginas)
            $(document).on('click', '.eliminar-carrito', function() {
                var button = $(this);
                var id = button.data('id');
                button.html('<div class="animate-spin rounded-full h-4 w-4 border-b-2 border-current"></div>').prop('disabled', true);

                $.ajax({
                    url: '/carrito/eliminar',
                    type: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#carrito-count, #mobile-carrito-count').text(response.count);
                            // Actualizar dropdown
                            $.get('/carrito/dropdown', function(data) {
                                $('#carrito-content').html(data);
                            });
                            showAlert('Curso eliminado del carrito', 'success');
                        } else {
                            showAlert(response.message, 'error');
                        }
                    },
                    error: function() {
                        showAlert('Error al eliminar del carrito', 'error');
                    }
                });

                function showAlert(message, type) {
                    var alertClass = type === 'success' ? 'bg-green-500' : 'bg-red-500';
                    var alert = $('<div class="' + alertClass + ' text-white px-4 py-2 rounded fixed top-4 right-4 z-50 shadow-lg">' + message + '</div>');
                    $('body').append(alert);
                    setTimeout(function() {
                        alert.fadeOut(function() {
                            alert.remove();
                        });
                    }, 3000);
                }
            });
        });
    </script>
</body>
</html>
