<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', ['projects' => $projects,'title' => 'Project']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'body' => 'required',
            'url' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('img/projects', config('filesystems.default_public_disk'));
            $validated['image'] = $path;
        }

        $project::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'image' => $validated['image'],
            'body' => $request->body,
            'url' => $request->url,
        ]);

        return redirect()->route('projects')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', ['projects' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => Rule::unique(Project::class)->ignore($project->id),
            'body' => 'required',
            'url' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if (!empty($project->image)) {
                Storage::disk(config('filesystems.default_public_disk'))
                    ->delete($project->image);
            }

        $validated['image'] = $request->file('image')
            ->store('img/projects', config('filesystems.default_public_disk'));
        }


        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'image' => $validated['image'] ?? $project->image,
            'body' => $request->body,
            'url' => $request->url,
        ]);

        return redirect()->route('projects')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects')->with('success', 'Project deleted successfully');
    }
}
