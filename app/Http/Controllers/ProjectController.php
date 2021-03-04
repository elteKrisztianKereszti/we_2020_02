<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = [
            [
                'id' => 1,
                'name' => 'ProjectName #1',
                'description' => 'ProjectDescription #1',
                'url' => null
            ],
            [
                'id' => 2,
                'name' => 'ProjectName #2',
                'description' => 'ProjectDescription #2',
                'url' => 'https://media.macphun.com/img/uploads/customer/how-to/579/15531840725c93b5489d84e9.43781620.jpg?q=85&w=1340'
            ],
            [
                'id' => 999,
                'name' => 'ProjectName #n',
                'description' => 'ProjectDescription #n',
                'url' => null
            ],
        ];

        return view('projects.index', [
            'projects' => $projects
        ]);
    }
}
