@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm p-4">
            <h1 class="mb-3">{{ $module->name }}</h1>
            <p class="text-muted mb-4">{{ $module->description }}</p>

            @if($module->image_url)
                <img src="{{ $module->image_url }}" alt="{{ $module->name }}" class="img-fluid rounded mb-4">
            @endif

            <a href="{{ route('modules.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
