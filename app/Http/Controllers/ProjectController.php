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

    public function show($id) {
        $project = Project::find($id);

        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update($id, Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image_url' => 'nullable|url'
        ]);

        $project = Project::find($id);
        $project->update($validated_data);

        return redirect()->route('projects.list');
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

    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->route('projects.list');
    }
}
