@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">Synth Modules</h1>
        <div class="row g-4">
            @foreach($modules as $module)
                <div class="col-md-6">
                    <div class="card h-100">
                        @if($module->image_url)
                            <img src="{{ $module->image_url }}" class="card-img-top" alt="{{ $module->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $module->name }}</h5>
                            <p class="card-text">{{ $module->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
