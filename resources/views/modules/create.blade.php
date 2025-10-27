@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm rounded-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Add New Synth Module</h2>

                        <form action="{{ route('modules.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image_url" class="form-label">Image URL</label>
                                <input type="text" name="image_url" id="image_url" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Add Module</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
