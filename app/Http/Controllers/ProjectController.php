<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Exception;
use JWTAuth;
use DB;

class ProjectController extends RespondController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $token = JWTAuth::getToken();
            // $user = JWTAuth::getPayload($token)->toArray();
            $user = JWTAuth::toUser($token);
            // print_r($user);
            $projects = Project::with('posts')->paginate();
            $counts = $this->countData($projects);
            return $this->sendResponse(true, "get all projects", 200, ['projects' => $projects, 'counts' => $counts, 'token' => $user]);
        } catch (Exception $e) {
            return $this->sendResponse(false, "error get all projects", 500, $e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create($request->all());
        return $this->sendResponse(true, "create project", 201, $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return $this->sendResponse(true, "update project", 200, $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // $project = Project::findOrFail($id);
        $project->delete();
        return $this->sendResponse(true, "delete project", 204, $project);
    }

    public function filter(Request $request) 
    {
        if($request->query('name'))
        {
            $value = strtolower($request->query('name'));
            $result = Project::where('name', $value)->orWhere('name', 'like', '%'.$value.'%')->get();
        }
        else if($request->query('description'))
        {
            $value = strtolower($request->query('description'));
            $result = Project::where('description', $value)->orWhere('description', 'like', '%'.$value.'%')->get();            
        }
        else if($request->query('name') && $request->query('description'))
        {
            $name = strtolower($request->query('name'));
            $description = strtolower($request->query('description'));
            $match = ['name' => $name, 'description' => $description];
            $result = Project::where($match)->orWhere('name', 'like', '%'.$value.'%')->get();           
        }
        else 
        {
            return $this->index();
        }
        return $this->sendResponse(true, "count project", 200, $result);
    }

    public function count(Request $request)
    {
        if($request->query('status'))
        {
            $result = Project::where('status', $request->query('status'))->get();
        }
        else 
        {
            $result = Project::all();
        }
        $count = count($result);
        return $this->sendResponse(true, "count project", 200, ['count' => $count]);
    }
}
