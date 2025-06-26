@extends('layouts.footer')

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="EduSync - Cursos de tecnologia com especialistas. Aprenda programação, design, ciência de dados e desenvolvimento web com professores qualificados." />
    <meta property="og:title" content="EduSync - Aulas Particulares de Tecnologia" />
    <meta property="og:description" content="Conectando alunos aos melhores especialistas em tecnologia" />
    <meta property="og:image" content="https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg" />
    <meta property="og:url" content="#" />
    <meta name="twitter:card" content="summary_large_image" />
    <title>EduSync - Aulas Particulares de Tecnologia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        .hero-bg {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.4) 100%), 
                              url('https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .btn-glow:hover {
            box-shadow: 0 0 15px #3b82f6;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        .sticky-nav {
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(10px);
        }

</style>

    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navigation -->
    <nav class="sticky-nav bg-white/80 shadow-sm">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="#" class="flex items-center">
                        <i class="fas fa-laptop-code text-blue-500 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-gray-800">EduSync</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                 @if(Auth::guard('aluno')->check())
                <a href="{{ route('editar-aluno') }}" >
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::guard('aluno')->user()->nome) }}&background=random&size=100" class="w-10 h-10 rounded-full" alt="Foto do aluno">
                
                </a>
            @endif
                    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-4">
         Sair
    </button>
</form>
                    <div class="relative">
                        <select class="appearance-none bg-transparent border-0 text-gray-700 focus:outline-none">
                        </select>
                    </div>
                </div>
                <div class="md:hidden">
                    <button class="text-gray-700 focus:outline-none" aria-label="Menu" aria-expanded="false" id="mobile-menu-button">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        

    </nav>

    <!-- Hero Section -->
    <section class="hero-bg min-h-[90vh] flex items-center justify-center text-white animate-fade-in">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-pulse">
                Domine Tecnologia com a <span class="text-blue-400">EduSync</span>
            </h1>
            <p class="text-xl md:text-2xl mb-10 max-w-2xl mx-auto">
                Conectando alunos aos melhores especialistas em tecnologia
            </p>
           
            <div class="mt-16 animate-bounce">
                <a href="#about" class="text-white text-2xl">
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Sessão Missão e História -->
<section id="about" class="relative py-20 text-white">
  <div class="absolute inset-0 bg-gradient-to-br from-blue-800 via-indigo-900 to-purple-900 opacity-90 z-0"></div>
  <div class="relative z-10 container mx-auto px-6 max-w-6xl">
    <h2 class="text-4xl font-bold text-center mb-12">Nossa Missão e História</h2>
    
    <div class="mb-12 space-y-8 text-lg leading-relaxed text-gray-100">
      <div>
        <h3 class="text-2xl font-semibold mb-4 text-blue-400">Missão</h3>
        <p>
          Na EduSync, nossa missão é democratizar o acesso ao conhecimento tecnológico,
          conectando alunos apaixonados a professores qualificados e dedicados.
          Acreditamos que a educação de qualidade transforma vidas e impulsiona o futuro.
          Por isso, buscamos sempre oferecer uma experiência de aprendizado inovadora, prática e personalizada.
        </p>
      </div>
      <div>
        <h3 class="text-2xl font-semibold mb-4 text-blue-400">Nossa História</h3>
        <p>
          Fundada em 2025, a EduSync nasceu da visão de criar uma plataforma que aproximasse
          especialistas em tecnologia de estudantes de todas as idades e níveis.
          Desde então, temos crescido com o compromisso de facilitar o aprendizado,
          fomentar comunidades e contribuir para o desenvolvimento profissional e pessoal de nossos usuários.
        </p>
      </div>
    </div>

    <div class="text-center">
      <a href="{{ route('catalogo') }}"
         class="inline-block bg-white text-blue-600 font-bold py-4 px-8 rounded-full shadow-lg hover:bg-blue-100 transition transform hover:scale-105">
        Conhecer nosso time de professores
      </a>
    </div>
  </div>
</section>

\
    <!-- Footer -->
    <!-- <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">EduSync</h3>
                    <p class="text-gray-400">Conectando alunos aos melhores especialistas em tecnologia desde 2023.</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Links Rápidos</h3>
                    <ul class="space-y-2">
                        <li><a href="index.html" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white">Sobre</a></li>
                        <li><a href="cadastro-alunos.html" class="text-gray-400 hover:text-white">Cadastro Aluno</a></li>
                        <li><a href="cadastro-professor.html" class="text-gray-400 hover:text-white">Cadastro Professor</a></li>
                    </ul>
                </div> -->
                <!-- <div> -->
                    <!-- <h3 class="text-xl font-bold mb-4">Cursos</h3>
                    <ul class="space-y-2">
                        <li><a href="programacao.html" class="text-gray-400 hover:text-white">Programação</a></li>
                        <li><a href="design.html" class="text-gray-400 hover:text-white">Design</a></li>
                        <li><a href="ciencia-dados.html" class="text-gray-400 hover:text-white">Ciência de Dados</a></li>
                        <li><a href="desenvolvimento-web.html" class="text-gray-400 hover:text-white">Desenvolvimento Web</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Newsletter</h3>
                    <p class="text-gray-400 mb-4">Assine para receber atualizações sobre novos cursos.</p>
                    <form class="flex" id="newsletter-form">
                        <input type="email" placeholder="Seu email" class="px-4 py-2 w-full rounded-l-lg focus:outline-none text-gray-800" required aria-required="true" />
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-r-lg">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div> -->
            <!-- <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 EduSync. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer> -->

    <!-- Back to Top Button -->
    <a href="#" class="fixed bottom-6 right-6 bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-600 transition">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.createElement('div');
        mobileMenu.className = 'md:hidden hidden absolute top-16 left-0 right-0 bg-white shadow-lg py-4 px-6';
        mobileMenu.innerHTML = `
            <a href="index.html" class="block py-2 text-gray-700 hover:text-blue-500">Home</a>
            <a href="#about" class="block py-2 text-gray-700 hover:text-blue-500">Sobre</a>
            <a href="cadastro-alunos.html" class="block py-2 text-gray-700 hover:text-blue-500">Aluno</a>
            <a href="cadastro-professor.html" class="block py-2 text-gray-700 hover:text-blue-500">Professor</a>
        `;
        document.body.appendChild(mobileMenu);

        mobileMenuButton.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('hidden');
        });

        // Newsletter form handling
        document.getElementById('newsletter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            // Aqui você enviaria o email para o backend
            alert('Obrigado por se inscrever! Entraremos em contato em breve.');
            this.reset();
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
