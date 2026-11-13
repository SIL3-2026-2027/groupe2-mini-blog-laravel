<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('articles.index') }}" class="text-2xl font-black text-blue-600 tracking-tighter">
                    Mini-Blog
                </a>
            </div>

            <!-- Menu de droite -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('articles.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">Articles</a>
                
                @auth
                    <a href="{{ route('articles.dashboard') }}" class="text-gray-600 hover:text-gray-900 font-medium">Mes Articles</a>
                    <div class="text-gray-600 font-medium">{{ Auth::user()->name }}</div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 font-medium">Connexion</a>
                    <a href="{{ route('register') }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg font-bold hover:bg-gray-900 transition">Inscription</a>
                @endauth
            </div>
        </div>
    </div>
</nav>