@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm rounded-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Add New Synth Module</h2>

                        <!-- Back to Home Button -->
                        <div class="mb-3">
                            <a href="{{ route('home') }}" class="btn btn-secondary w-100 mb-3">Back to Home</a>
                        </div>

                        <form action="{{ route('modules.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <div class="d-flex gap-2">
                                    <input type="file" name="image" id="imageInput" class="form-control">
                                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('imageInput').value=''">
                                        Clear
                                    </button>
                                </div>
                                @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">External URL (optional)</label>
                                <input type="text" name="external_url" class="form-control" value="{{ old('external_url') }}">
                                @error('external_url') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Add Module</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
