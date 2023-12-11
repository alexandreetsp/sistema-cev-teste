<header class="grid grid-cols-2 py-10">
    <div>
        <a href="{{ route('listings.index') }}">Home</a>
    </div>
    <nav class="grid grid-cols-2">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Registrar</a>
    

        <a href="{{ route('logout') }}">Log out</a>
    </nav>
</header>
