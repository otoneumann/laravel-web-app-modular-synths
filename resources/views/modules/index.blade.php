@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">Synth Modules</h1>
        <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Create new Synth Module</a>

        <div class="row g-4">
            @foreach($modules as $module)
                <div class="col-md-6">
                    <div class="card h-100">
                        @if($module->image_path)
                            <a href="{{ $module->external_url ?? '#' }}" target="_blank">
                                <img src="{{ asset('storage/' . $module->image_path) }}" class="card-img-top" alt="{{ $module->name }}">
                            </a>
                        @elseif($module->image_url)
                            <a href="{{ $module->external_url ?? '#' }}" target="_blank">
                                <img src="{{ $module->image_url }}" class="card-img-top" alt="{{ $module->name }}">
                            </a>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $module->name }}</h5>
                            <p class="card-text">{{ $module->description }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('modules.destroy', $module->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this module?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
