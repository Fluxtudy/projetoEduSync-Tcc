<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSync - Dashboard do Professor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .input-editable:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen font-sans">
   
    <header>
    
    <!-- Hero Section - Meu Perfil (Dashboard Professor) -->
<section class="hero-bg min-h-[400px] flex items-center justify-center text-white">
  <div class="container mx-auto px-6 text-center">
    <div class="flex flex-col items-center space-y-5">
      
      <h1 class="text-4xl md:text-5xl font-bold">
        Bem vindo, <span class="text-red-400"> {{ Auth::guard('professor')->user()->nome }}
</span>
      </h1>
      <p class="text-lg text-gray-300">Visualize e atualize suas informações pessoais</p>
    </div>
  </div>
</section>

<style>
.hero-bg {
  background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
    url('https://images.pexels.com/photos/4144228/pexels-photo-4144228.jpeg');
  background-size: cover;
  background-position: center;
}
</style>

    </header>

    <!-- Dashboard Content -->
    <main class="max-w-4xl mx-auto py-12 px-6">
        <form action="{{ route('professor.update', $professor->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="bg-white rounded-xl shadow-lg p-8">
            <div class="flex flex-col items-center space-y-4">
                <!-- Foto do professor -->
                <!-- <div class="relative w-32 h-32">
                    <img src="https://via.placeholder.com/150" alt="Foto do Professor" class="rounded-full w-full h-full object-cover border-4 border-red-500">
                    <label for="fotoUpload" class="absolute bottom-0 right-0 bg-white p-2 rounded-full shadow cursor-pointer hover:bg-red-100">
                        <i class="fas fa-camera text-red-500"></i>
                    </label>
                    <input type="file" id="fotoUpload" class="hidden" accept="image/*">
                </div> -->

               <!-- Exemplo para o campo Nome -->
<div class="w-full flex flex-col border-b border-gray-300 py-2">
    <label for="nome" class="mb-1 text-gray-700 font-semibold">Nome</label>
    <div class="flex items-center">
        <input type="text" id="nome" name="nome" class="flex-1 bg-transparent input-editable px-2 py-1" value="{{ old('nome', $professor->nome) }}"  >
        <button class="ml-2 text-gray-500 hover:text-red-500" onclick="toggleEdit(this)">
            <i class="fas fa-edit"></i>
        </button>
    </div>
</div>

<!-- Email -->
<div class="w-full flex flex-col border-b border-gray-300 py-2">
    <label for="email" class="mb-1 text-gray-700 font-semibold">Email</label>
    <div class="flex items-center">
        <input type="email" id="email" name="email" class="flex-1 bg-transparent input-editable px-2 py-1" value="{{ old('email', $professor->email) }}">
        <button class="ml-2 text-gray-500 hover:text-red-500" onclick="toggleEdit(this)">
            <i class="fas fa-edit"></i>
        </button>
    </div>
</div>

<!-- Área de Ensino -->
<div class="w-full flex flex-col border-b border-gray-300 py-2">
    <label for="area" class="mb-1 text-gray-700 font-semibold">Área de Ensino</label>
    <div class="flex items-center">
        <input type="text" id="area" name="area" class="flex-1 bg-transparent input-editable px-2 py-1" value="{{ old('area', $professor->area_atuacao) }}" >
        <button class="ml-2 text-gray-500 hover:text-red-500" onclick="toggleEdit(this)">
            <i class="fas fa-edit"></i>
        </button>
    </div>
</div>

<!-- Anos de Experiência -->
<div class="w-full flex flex-col border-b border-gray-300 py-2">
    <label for="anos_experiencia" class="mb-1 text-gray-700 font-semibold">Anos de Experiência</label>
    <div class="flex items-center">
        <input type="number" id="anos_experiencia" name="anos_experiencia" class="flex-1 bg-transparent input-editable px-2 py-1" value="{{ old('anos_experiencia', $professor->anos_experiencia ?? '') }}">
        <button class="ml-2 text-gray-500 hover:text-red-500" onclick="toggleEdit(this)">
            <i class="fas fa-edit"></i>
        </button>
    </div>
</div>

<!-- Link do Portfólio -->
<div class="w-full flex flex-col border-b border-gray-300 py-2">
    <label for="portfolio" class="mb-1 text-gray-700 font-semibold">Link do Portfólio</label>
    <div class="flex items-center">
        <input type="url" id="portfolio" name="portfolio" class="flex-1 bg-transparent input-editable px-2 py-1" value="{{ old('portfolio', $professor->portfolio) }}" >
        <button class="ml-2 text-gray-500 hover:text-red-500" onclick="toggleEdit(this)">
            <i class="fas fa-edit"></i>
        </button>
    </div>
</div>


                <!-- Botão Salvar Alterações -->
                <button type="submit" 
                    class="w-full bg-blue-500 hover:bg-red-600 text-white font-bold py-4 px-6 rounded-lg btn-glow transition-all duration-300 transform hover:scale-[1.02]">
                    <i class="fas fa-save mr-2"></i> Salvar Alterações
                </button>
                </form>

                <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                    Sair
                </button>
            </form>


                <!-- Botão Excluir Perfil -->
                <div class="text-center mt-4">
    <form method="POST" action="{{ route('professor.destroy', Auth::guard('professor')->user()->id) }}"
          onsubmit="return confirm('Tem certeza que deseja excluir seu perfil?');">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="text-sm text-red-600 hover:underline hover:text-red-800 transition">
            Excluir Perfil
        </button>
    </form>
</div>
            </div>
        </div>
    </main>

    
</body>
</html>
