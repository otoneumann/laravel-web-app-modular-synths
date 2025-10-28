<?php

namespace App\Http\Controllers;

use App\Models\SynthModule;
use Illuminate\Http\Request;

class SynthModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = SynthModule::all();
        return view('modules.index', compact('modules'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048', // optional uploaded image
            'image_url' => 'nullable|string',     // optional URL for redirect
        ]);

        $module = new SynthModule();
        $module->name = $validated['name'];
        $module->description = $validated['description'];

        // handle file upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('modules', 'public');
            $module->image_path = $path;
        }

        // store URL if provided
        $module->image_url = $validated['image_url'] ?? null;

        $module->save();

        return redirect()->route('modules.index')->with('success', 'Synth Module created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $module = SynthModule::findOrFail($id);
        return view('modules.show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $module = SynthModule::findOrFail($id);
        return view('modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SynthModule $module)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'external_url' => 'nullable|string|max:255',
            'delete_image' => 'nullable|boolean',
        ]);

        // Handle image deletion
        if ($request->has('delete_image') && $module->image_path) {
            \Storage::delete('public/' . $module->image_path);
            $module->image_path = null;
        }

        // Handle new image upload
        if ($request->hasFile('image')) {
            if ($module->image_path) {
                \Storage::delete('public/' . $module->image_path);
            }
            $path = $request->file('image')->store('modules', 'public');
            $module->image_path = $path;
        }

        // Update other fields
        $module->name = $validated['name'];
        $module->description = $validated['description'];
        $module->external_url = $validated['external_url'] ?? $module->external_url;

        $module->save();

        return redirect()->route('modules.index')->with('success', 'Module updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SynthModule $module)
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module deleted successfully.');
    }
}
