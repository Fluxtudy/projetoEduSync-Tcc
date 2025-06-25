<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduSync - Catálogo de Professores</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                              url('https://images.pexels.com/photos/1181244/pexels-photo-1181244.jpeg');
            background-size: cover;
            background-position: center;
        }
        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="font-sans bg-gray-100">
    <!-- Hero Section -->
    <section class="hero-bg min-h-[400px] flex items-center justify-center text-white">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                Nosso <span class="text-green-400">Time de Professores</span>
            </h1>
            
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Conheça os profissionais que vão guiar seu aprendizado no mundo da tecnologia
            </p>
            
                
            </a>
        </div>
    </section>

    <!-- Professores Section -->
    <section class="py-16">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Catálogo de Professores</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($professores as $professor)
            <div class="bg-white rounded-lg shadow p-6 flex flex-col">
                <div class="flex items-center space-x-4 mb-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($professor->nome) }}&background=random&size=100" class="w-16 h-16 rounded-full" alt="Foto do professor">
                    <div>
                        <h2 class="text-xl font-bold">{{ $professor->nome }}</h2>
                        <p class="text-green-600 font-semibold">
                            {{ $professor->area_atuacao ?? 'area não informada' }}
                        </p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    {{ $professor->descricao ?? 'Sem descrição disponível.' }}
                </p>
               <a href="tel:{{ $professor->telefone }}" class="mt-auto inline-flex items-center justify-center px-4 py-2 bg-green-500 text-white font-bold rounded hover:bg-green-600">
                    📞 {{ $professor->telefone }}
               </a>
            </div>
        @empty
            <p>Nenhum professor cadastrado ainda.</p>
        @endforelse
    </div>
    <div class="mt-12 text-center">
    <a href="{{ route('home-aluno') }}" class="inline-block bg-green-500 text-white px-6 py-3 rounded font-bold hover:bg-green-600 transition duration-200">
         Voltar
    </a>
</div>
</div>
        </div>
    </section>
</body>
</html>
