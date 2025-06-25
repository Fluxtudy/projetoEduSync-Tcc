<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EduSync - Dashboard do Aluno</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
  <style>
    .hero-bg {
      background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
        url('https://images.pexels.com/photos/4145190/pexels-photo-4145190.jpeg');
      background-size: cover;
      background-position: center;
    }
    .btn-glow:hover {
      box-shadow: 0 0 15px #3b82f6;
    }
    .input-group:focus-within label {
      transform: translateY(-1.5rem) scale(0.85);
      color: #3b82f6;
    }
  </style>
</head>
<body class="font-sans bg-gray-100">
  <!-- Hero Section -->
        <section class="hero-bg min-h-[300px] flex items-center justify-center text-white">
        <div class="container mx-auto px-6 text-center">
           <h1 class="text-4xl md:text-5xl font-bold"> 
           Olá, <span class="text-blue-400"> {{ Auth::guard('aluno')->user()->nome }}</span>
           </h1>
        </div>
        </section>

  <!-- Formulário -->
  <section class="py-16">
    <div class="container mx-auto px-6 max-w-3xl">
      <div class="bg-white rounded-xl shadow-lg p-8 md:p-10">
        

          <form action="{{ route('editar-aluno') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block font-bold">Nome:</label>
            <input type="text" name="nome" id="nome" class="w-full border p-2 rounded" value="{{ old('nome', $alunos->nome) }}">
            @error('nome') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-bold">Email:</label>
            <input type="email" name="email" id="email" class="w-full border p-2 rounded" value="{{ old('email', $alunos->email) }}">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="telefone" class="block font-bold">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="w-full border p-2 rounded" value="{{ old('telefone', $alunos->telefone) }}">
        </div>

        <div class="flex gap-4">
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
         Salvar Alterações
    </button>

    <a href="{{ route ('home-aluno') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 inline-block">
         Voltar
    </a>
</div>
    </form>

        <!-- Ações rápidas -->
        <div class="mt-8 text-right">
           <form method="POST" action="{{ route('aluno.destroy', Auth::guard('aluno')->user()->id) }}"
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
  </section>
</body>
</html>
