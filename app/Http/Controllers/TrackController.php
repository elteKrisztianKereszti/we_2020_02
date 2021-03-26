<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackFormRequest;
use App\Models\Filter;
use App\Models\Project;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Track::class, 'track');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('tracks.create', [
            'project_id' => $project->id,
            'filters' => Filter::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, TrackFormRequest $request)
    {
        $validated_data = $request->validated();

        $track = $project->tracks()->create($validated_data);
        $track->filters()->sync($validated_data['filters'] ?? []);
        return redirect()->route('projects.show', [ 'project' => $project->id ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        return view('tracks.edit', [
            'track' => $track,
            'filters' => Filter::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(TrackFormRequest $request, Track $track)
    {
        $validated_data = $request->validated();

        $track->update($validated_data);
        $track->filters()->sync($validated_data['filters'] ?? []);
        return redirect()->route('projects.show', [ 'project' => $track->project_id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $track->delete();

        return redirect()->route('projects.show', [ 'project' => $track->project_id ]);
    }
}
