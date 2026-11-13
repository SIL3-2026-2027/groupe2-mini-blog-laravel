@props(['article'])

<div class="bg-white overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 rounded-xl flex flex-col h-full">
    <!-- Gestion de l'image (si elle existe, sinon un placeholder gris) -->
    <div class="h-48 w-full bg-gray-200 relative">
        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
        @else
            <div class="flex items-center justify-center w-full h-full text-gray-400">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        @endif
    </div>

    <div class="p-5 flex-1 flex flex-col justify-between">
        <div>
            <h2 class="text-lg font-bold text-gray-900 leading-tight mb-2">
                <a href="{{ route('articles.show', $article) }}" class="hover:text-blue-600">
                    {{ $article->title }}
                </a>
            </h2>
            <p class="text-sm text-gray-500 mb-3">
                Par {{ $article->user->name }} • {{ $article->created_at->format('d/m/Y') }}
            </p>
            <p class="text-gray-600 text-sm line-clamp-3">
                {{ Str::limit($article->contenu, 100) }}
            </p>
        </div>

        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between">
            <a href="{{ route('articles.show', $article) }}" class="text-blue-600 text-sm font-semibold hover:underline">
                Lire la suite &rarr;
            </a>
            
            <!-- Boutons Modifier/Supprimer -->
            @auth
                @if(auth()->id() === $article->user_id)
                    <div class="flex space-x-2">
                        <a href="{{ route('articles.edit', $article) }}" class="text-yellow-500 hover:text-yellow-700 text-sm">Modifier</a>
                        <form method="POST" action="{{ route('articles.destroy', $article) }}" onsubmit="return confirm('Supprimer ?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Supprimer</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>