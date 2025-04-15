<h2>Cadastro</h2>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input name="name" placeholder="Nome" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Senha" required>
    <input name="password_confirmation" type="password" placeholder="Confirmar senha" required>

    <select name="role" required>
        <option value="aluno">Aluno</option>
        <option value="professor">Professor</option>
    </select>

    <button type="submit">Registrar</button>
</form>