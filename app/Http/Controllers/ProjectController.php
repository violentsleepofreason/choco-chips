<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Asset;
use App\Models\License;
use App\Models\Accessory;
use App\Models\Consumable;
use App\Models\Component;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        echo "dfdsfdsf";
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('index', Consumable::class);
        return view('project/index')->with('project',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function projectid(Request $request)

    {

        //$input = $request->all();
        $projectID = Asset::find($request['id'])->projectID;
        $project_name = "";
        if ($projectID != null) {

            $project_name = Project::find($projectID)->project_name;
        }
        
        return response()->json(['project_name'=>$project_name]);

    }
    public function parentprojectid(Request $request)

    {

        //$input = $request->all();
        $projectID = Asset::find($request['id'])->parentprojectID;
        $project_name = "";
        if ($projectID != null) {
            
            $project_name = Project::find($projectID)->project_name;
        }
        
        return response()->json(['project_name'=>$project_name]);

    }

    public function lprojectid(Request $request)

    {

        //$input = $request->all();
        $projectID = License::find($request['id'])->projectID;
        $project_name = "";
        if ($projectID != null) {

            $project_name = Project::find($projectID)->project_name;
        }
        
        return response()->json(['project_name'=>$project_name]);

    }
    public function lparentprojectid(Request $request)

    {

        //$input = $request->all();
        $projectID = License::find($request['id'])->parentprojectID;
        $project_name = "";
        if ($projectID != null) {
            
            $project_name = Project::find($projectID)->project_name;
        }
        
        return response()->json(['project_name'=>$project_name]);

    }
    public function aprojectid(Request $request)

    {

        //$input = $request->all();
        $projectID = Accessory::find($request['id'])->projectID;
        $project_name = "";
        if ($projectID != null) {

            $project_name = Project::find($projectID)->project_name;
        }
        
        return response()->json(['project_name'=>$project_name]);

    }
    public function aparentprojectid(Request $request)

    {

        //$input = $request->all();
        $projectID = Accessory::find($request['id'])->parentprojectID;
        $project_name = "";
        if ($projectID != null) {
            
            $project_name = Project::find($projectID)->project_name;
        }
        
        return response()->json(['project_name'=>$project_name]);

    }
    public function nprojectid(Request $request)

    {

        //$input = $request->all();
        $projectID = Consumable::find($request['id'])->projectID;
        $project_name = "";
        if ($projectID != null) {

            $project_name = Project::find($projectID)->project_name;
        }
        
        return response()->json(['project_name'=>$project_name]);

    }
    public function nparentprojectid(Request $request)

    {

        //$input = $request->all();
        $projectID = Consumable::find($request['id'])->parentprojectID;
        $project_name = "";
        if ($projectID != null) {
            
            $project_name = Project::find($projectID)->project_name;
        }
        
        return response()->json(['project_name'=>$project_name]);

    }
    public function mprojectid(Request $request)

    {

        //$input = $request->all();
        $projectID = Component::find($request['id'])->projectID;
        $project_name = "";
        if ($projectID != null) {

            $project_name = Project::find($projectID)->project_name;
        }
        
        return response()->json(['project_name'=>$project_name]);

    }
    public function mparentprojectid(Request $request)

    {

        //$input = $request->all();
        $projectID = Component::find($request['id'])->parentprojectID;
        $project_name = "";
        if ($projectID != null) {
            
            $project_name = Project::find($projectID)->project_name;
        }
        
        return response()->json(['project_name'=>$project_name]);

    }
}
