@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm rounded-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Edit Synth Module</h2>

                        <div class="mb-3 text-center">
                            <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">← Back to Home</a>
                        </div>

                        <form action="{{ route('modules.update', $module->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $module->name) }}">
                                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description', $module->description) }}</textarea>
                                @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Current Image</label><br>
                                @if($module->image_path)
                                    <img src="{{ asset('storage/' . $module->image_path) }}" alt="{{ $module->name }}" class="img-fluid mb-2">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="delete_image" value="1" class="form-check-input" id="deleteImage">
                                        <label class="form-check-label" for="deleteImage">Delete current image</label>
                                    </div>
                                @endif
                                <input type="file" name="image" class="form-control">
                                @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Optional URL (e.g., VCV Rack link)</label>
                                <input type="text" name="external_url" class="form-control" value="{{ old('external_url', $module->external_url) }}">
                                @error('external_url') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-success w-100">Update Module</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
