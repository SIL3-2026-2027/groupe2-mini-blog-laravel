@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg sm:rounded-2xl p-8">
            <h1 class="text-2xl font-bold mb-6">Créer un nouvel article</h1>

            <!-- N'oubliez pas le enctype pour les fichiers ! -->
            <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Titre de l'article</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Image de couverture</label>
                    <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Contenu</label>
                    <textarea name="contenu" rows="8" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('contenu') }}</textarea>
                    @error('contenu') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-6 flex items-center">
                    <input type="checkbox" name="publie" id="publie" value="1" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200" {{ old('publie') ? 'checked' : '' }}>
                    <label for="publie" class="ml-2 text-gray-700 font-medium">Publier immédiatement</label>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors">
                    Enregistrer l'article
                </button>
            </form>
        </div>
    </div>
</div>
@endsection