<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $projects = Project::all()->where('user_id', $user_id);

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project) {
        $this->authorize('view', $project);

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

    public function update(Project $project, ProjectFormRequest $request)
    {
        $validated_data = $request->validated();

        $project->update($validated_data);

        return redirect()->route('projects.show', [ 'project' => $project->id ]);
    }

    public function store(ProjectFormRequest $request)
    {
        $validated_data = $request->validated();

        Project::create($validated_data);

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
