<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function show(Project $project) {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update(Project $project, Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image_url' => 'nullable|url'
        ]);

        $project->update($validated_data);

        return redirect()->route('projects.show', [ 'project' => $project->id ]);
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image_url' => 'nullable|url'
        ]);
        Project::create($validated_data);

        return redirect()->route('projects.list');
    }

    public function delete(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.list');
    }
}
