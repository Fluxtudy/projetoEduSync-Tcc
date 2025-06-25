<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cursos completos de Programação na EduSync.">
    <meta property="og:title" content="EduSync - Cursos de Programação">
    <meta property="og:description" content="Domine as linguagens de programação mais demandadas do mercado">
    <meta property="og:image" content="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg">
    <meta property="og:url" content="https://edusync.com.br/programacao">
    <title>@yield('title', 'EduSync')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .hero-bg {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.4)),
                              url('https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .course-card:hover {
            transform: translateY(-5px) rotate(1deg);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        .sticky-nav {
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(10px);
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }
    </style>

    @stack('styles')
</head>
<body class="font-sans bg-gray-50">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- MAIN CONTENT --}}
    <main class="min-h-screen py-12 px-4">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts.footer')

    {{-- Back to top --}}
    <a href="#" class="fixed bottom-6 right-6 bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-600 transition">
        <i class="fas fa-arrow-up"></i>
    </a>

    @stack('scripts')
</body>
</html>
