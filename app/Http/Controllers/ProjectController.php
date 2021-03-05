<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = [
            [
                'id' => 1,
                'name' => 'ProjectName #1',
                'description' => 'ProjectDescription #1',
                'image_url' => null
            ],
            [
                'id' => 2,
                'name' => 'ProjectName #2',
                'description' => 'ProjectDescription #2',
                'image_url' => 'https://media.macphun.com/img/uploads/customer/how-to/579/15531840725c93b5489d84e9.43781620.jpg?q=85&w=1340'
            ],
            [
                'id' => 999,
                'name' => 'ProjectName #n',
                'description' => 'ProjectDescription #n',
                'image_url' => null
            ],
        ];

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function show($id) {
        dd($id);
    }

    public function edit($id)
    {
        // Fetch data from database via id

        $project = [
                        'id' => 2,
                        'name' => 'ProjectName #2',
                        'description' => 'ProjectDescription #2',
                        'image_url' => 'https://media.macphun.com/img/uploads/customer/how-to/579/15531840725c93b5489d84e9.43781620.jpg?q=85&w=1340'
        ];
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function store(Request $request)
    {
        //dd($_POST);
        //dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image_url' => 'nullable|url'
        ]);

        // store in database

        return redirect('/projects');
    }
}
