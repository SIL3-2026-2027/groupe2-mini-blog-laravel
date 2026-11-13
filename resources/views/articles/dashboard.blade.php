@extends('layouts.app')

@section('title', 'Mes Articles')

@section('content')
<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900">Mon Tableau de bord</h1>
            <a href="{{ route('articles.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700">
                + Nouvel Article
            </a>
        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="p-4 font-bold text-gray-600">Titre</th>
                        <th class="p-4 font-bold text-gray-600">Statut</th>
                        <th class="p-4 font-bold text-gray-600">Date</th>
                        <th class="p-4 font-bold text-gray-600 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-4 font-medium text-gray-900">{{ $article->title }}</td>
                            <td class="p-4">
                                @if($article->publie)
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Publié</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-bold">Brouillon</span>
                                @endif
                            </td>
                            <td class="p-4 text-gray-500 text-sm">{{ $article->created_at->format('d/m/Y') }}</td>
                            <td class="p-4 text-right space-x-2">
                                <!-- Bouton Modifier -->
                                <a href="{{ route('articles.edit', $article) }}" class="text-blue-600 hover:underline text-sm font-medium">Modifier</a>
                                
                                <!-- Bouton Supprimer -->
                                <form method="POST" action="{{ route('articles.destroy', $article) }}" class="inline-block" onsubmit="return confirm('Supprimer cet article ?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm font-medium">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500">Vous n'avez écrit aucun article pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection