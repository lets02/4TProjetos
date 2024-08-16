@if (Auth::cheack())
  @if (Auth::user()->isEmpresa())
  <div>
    <a href="/vagas">Acesse Dashboard Vagas</a>
  </div>

  @endif
<div>
    <h3>Olá, {{Auth::user}}</h3>
</div>
<div>
    <form action="/logout" method="post">
      @csrf
      <input type='submit' value='Sair'>
    </form>
</div>
@else
<div class="nav-bar">
    <a href="/login">Login</a>
    <a href="/registro">/Registre-se</a>
</div>
<br><br>
<hr>
<br>

@endif
