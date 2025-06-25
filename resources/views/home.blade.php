<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EduSync - Cursos de tecnologia com especialistas. Aprenda programação, design, ciência de dados e desenvolvimento web com professores qualificados.">
    <meta property="og:title" content="EduSync - Aulas Particulares de Tecnologia">
    <meta property="og:description" content="Conectando alunos aos melhores especialistas em tecnologia">
    <meta property="og:image" content="https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg">
    <meta property="og:url" content="https://edusync.com.br">
    <meta name="twitter:card" content="summary_large_image">
    <title>EduSync - Aulas Particulares de Tecnologia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                <a class="text-gray-700 hover:text-blue-500 transition">Home</a>
                    <a href="#services" class="text-gray-700 hover:text-blue-500 transition">Cursos</a>
                    <a class="text-gray-700 hover:text-blue-500 transition">Aluno</a>
                    <a class="text-gray-700 hover:text-blue-500 transition">Professor</a>
                    <div class="relative">
                        <select class="appearance-none bg-transparent border-0 text-gray-700 focus:outline-none">
                            <option value="pt">🇧🇷 Português</option>
                            <option value="en">🇺🇸 English</option>
                        </select>
                    </div>
                </div>
                <div class="md:hidden">
                    <button class="text-gray-700 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    
    <section class="hero-bg min-h-[90vh] flex items-center justify-center text-white animate-fade-in">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-pulse">
                Domine Tecnologia com a <span class="text-blue-400">EduSync</span>
            </h1>
            <p class="text-xl md:text-2xl mb-10 max-w-2xl mx-auto">
                Conectando alunos aos melhores especialistas em tecnologia
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="login" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-8 rounded-full btn-glow transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-user-graduate mr-2"></i> Quero Aprender
                </a>
                <a href="login" class="bg-red-500 hover:bg-red-600 text-white font-bold py-4 px-8 rounded-full btn-glow transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-chalkboard-teacher mr-2"></i> Quero ensinar
                </a>
            </div>
            <div class="mt-16 animate-bounce">
                <a href="#services" class="text-white text-2xl">
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </div>
    </section>

    
    <section id="services" class="py-20 bg-gradient-to-r from-blue-500 to-purple-600">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-white mb-12">Áreas de Ensino EduSync</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform transition-all hover:scale-105">
                    <div class="h-48 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-code text-blue-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Programação</h3>
                        <p class="text-gray-600">Python, JavaScript, Java e mais</p>
                    </div>
                </div>
                
                
                <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform transition-all hover:scale-105">
                    <div class="h-48 bg-purple-100 flex items-center justify-center">
                        <i class="fas fa-paint-brush text-purple-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Design</h3>
                        <p class="text-gray-600">UI/UX, Figma, Photoshop</p>
                    </div>
                </div>
                
                
                <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform transition-all hover:scale-105">
                    <div class="h-48 bg-green-100 flex items-center justify-center">
                        <i class="fas fa-chart-line text-green-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Ciência de Dados</h3>
                        <p class="text-gray-600">Machine Learning, Análise de Dados</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
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
                        <li><a href="#services" class="text-gray-400 hover:text-white">Cursos</a></li>
                        <li><a href="cadastro-aluno.html" class="text-gray-400 hover:text-white">Cadastro Aluno</a></li>
                        <li><a href="cadastro-professor.html" class="text-gray-400 hover:text-white">Cadastro Professor</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Cursos</h3>
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
                    <form class="flex">
                        <input type="email" placeholder="Seu email" class="px-4 py-2 w-full rounded-l-lg focus:outline-none text-gray-800">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-r-lg">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 EduSync. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    
    <a href="#" class="fixed bottom-6 right-6 bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-600 transition">
        <i class="fas fa-arrow-up"></i>
    </a>

    
    <script>
        
        document.querySelector('.md\\:hidden button').addEventListener('click', function() {
            
        });

        
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