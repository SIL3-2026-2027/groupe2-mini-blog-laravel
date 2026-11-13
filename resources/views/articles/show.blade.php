@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        
        <a href="{{ route('articles.index') }}" class="text-blue-600 hover:text-blue-800 mb-6 inline-block font-medium">
            &larr; Retour aux articles
        </a>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-96 object-cover">
            @endif

            <div class="p-8 sm:p-12">
                <div class="flex justify-between items-start mb-4">
                    <h1 class="text-4xl font-extrabold text-gray-900">{{ $article->title }}</h1>
                    @if(!$article->publie)
                        <span class="bg-yellow-100 text-yellow-800 text-sm font-semibold px-3 py-1 rounded">Brouillon</span>
                    @endif
                </div>
                
                <div class="flex items-center text-gray-500 mb-8 border-b pb-4">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-xl mr-4">
                        {{ substr($article->user->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-bold text-gray-900 text-lg">{{ $article->user->name }}</p>
                        <p class="text-sm">Publié le {{ $article->created_at->format('d/m/Y à H:i') }}</p>
                    </div>
                </div>

                <div class="prose max-w-none text-gray-700 leading-relaxed text-lg whitespace-pre-line">
                    {{ $article->contenu }}
                </div>

                @auth
                    @if (auth()->id() === $article->user_id)
                        <div class="mt-12 pt-6 border-t border-gray-200 flex gap-4">
                            <a href="{{ route('articles.edit', $article) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                Modifier
                            </a>
                            <form method="POST" action="{{ route('articles.destroy', $article) }}" onsubmit="return confirm('Supprimer cet article ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection