@extends('layouts.app')

@section('page-title', 'Dettagli Progetto')

@section('main-content')
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>
    
    @if ($project->image)
        <img src="{{ $project->image }}" alt="Immagine di {{ $project->title }}">
    @endif

    <p>Iniziato: {{ $project->is_started ? 'Sì' : 'No' }}</p>

    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">Modifica Progetto</a>
    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare questo progetto?');">Elimina Progetto</button>
    </form>
@endsection
