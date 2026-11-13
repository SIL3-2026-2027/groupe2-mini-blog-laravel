@extends('layouts.app')

@section('title', 'Tous les articles')

@section('content')
<div class="bg-gray-50 min-h-screen">
    
    <!-- 1. BANNIÈRE HERO -->
    <div class="relative bg-blue-600 overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-blue-600 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-10 px-4 sm:px-6 lg:px-8">
                <main class="mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Bienvenue sur</span>
                            <span class="block text-yellow-400 xl:inline">Le Mini-Blog</span>
                        </h1>
                        <p class="mt-3 text-base text-blue-100 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Partagez vos idées, découvrez de nouveaux articles et exprimez votre créativité. Un espace simple et élégant pour tous les passionnés d'écriture.
                        </p>
                    </div>
                </main>
            </div>
        </div>
        <!-- Image de droite -->
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Bureau d'écriture">
        </div>
    </div>

    <!-- 2. LISTE DES ARTICLES -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Les Articles</h1>
                
                @auth
                    <a href="{{ route('articles.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow transition-colors flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Nouvel Article
                    </a>
                @endauth
            </div>

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <!-- Grille de 4 colonnes -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="articles">
                @forelse ($articles as $article)
                    <x-carte :article="$article" />
                @empty
                    <div class="col-span-4 text-center py-12 bg-white rounded-lg shadow-sm">
                        <p class="text-gray-500 text-lg">Aucun article n'est publié pour le moment.</p>
                    </div>
                @endforelse
            </div>
            
        </div>
    </div>
</div>
@endsection