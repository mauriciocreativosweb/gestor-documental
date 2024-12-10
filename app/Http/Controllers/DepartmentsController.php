<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Http\Requests\DepartmentRequest;
use App\Message\DepartmentMessage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Departments::all();
        return response()->json($departments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DepartmentRequest $departmentRequest)
    {
      //
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $departmentRequest)
    {
        try{
            $department = Departments::find()->where('departmentName','=', $departmentRequest->departmentName);
            if(!$department->exist()){
                $department =  new Departments();
                $department['departmentName'] = $departmentRequest->departmentName;
                $department->save();
                return response()->json([
                                    'status' => 'success',
                                    'message' =>  DepartmentMessage::successDepartmentCreate,
                                    'department' => $departmentRequest->departmentName],200);
            }
                return response()->json([
                                    'status' => 'fail',
                                    'message' =>  DepartmentMessage::successDepartmentCreate],200);
        }catch(ModelNotFoundException $eModel){
                return response()->json([
                                    'status' => 'fail',
                                    'message' =>  DepartmentMessage::failDeleteDepartmentModel,
                                    'error' => $eModel->getMessage()],404);
        }catch(\Exception $eException){
                return response()->json([
                                    'status' => 'fail',
                                    'message' =>  DepartmentMessage::failDeleteDepartmentException,
                                    'error' => $eException->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $departmentFind = Departments::findOrFail($id);
            return response()->json([
                                    'status' => 'success',
                                    'message' => DepartmentMessage::succcessFindDepartment,
                                    'department' => $departmentFind], 200);
        }catch(ModelNotFoundException $eModel){
            return response()->json([
                                    'status' => 'fail',
                                    'message' => DepartmentMessage::failFindDepartment,
                                    'error' => $eModel->getMessage()], 404);
        }catch(\Exception $eException){
            return response()->json([
                                    'status' => 'fail',
                                    'message' => DepartmentMessage::failFindDepartmentException,
                                    'error' => $eException->getMessage()],500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departments $departments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $departmentRequest, $id)
    {
        try{
            $dataDepartment = $departmentRequest->except(['_method', 'token']);
            $department = Departments::findOrFail($id);
            $department->update($dataDepartment);
            return response()->json([
                                'status' => 'success',
                                'message' => DepartmentMessage::successUpdateDepartment,
                                'department' => $department], 200);
        }catch(ModelNotFoundException $eModel){
            return response()->json([
                                'status' => 'success',
                                'message' => DepartmentMessage::failUpdateDepartmentModel,
                                'error' => $eModel->getMessage()], 404);
        }catch(\Exception $eException){
            return response()->json([
                                'status' => 'success',
                                'message' => DepartmentMessage::failUpdateDepartmentException,
                                'error' => $eException->getMessage()], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $departments = Departments::findOrFinl($id);
            if($departments){
                $departments->delete($id);
                return response()->json([
                                        'status' => 'success',
                                        'message' => DepartmentMessage::successDeleteDepartment,
                                        'department' => $departments],201);
            }
        }catch(ModelNotFoundException $eModel){
                return response()->json([
                                        'status' => 'fail',
                                        'message' => DepartmentMessage::failDeleteDepartmentModel,
                                        'error' => $eModel->getMessage()],404);
        }catch(\Exception $eException){
                return response()->json([
                                        'status' => 'fail',
                                        'message' => DepartmentMessage::failDeleteDepartmentModel,
                                        'error' => $eException->getMessage()],500);
        }
    }
}
