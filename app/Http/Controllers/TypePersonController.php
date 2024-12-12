<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypePersonRequest;
use App\Message\TypePersonMessage;
use App\Models\TypePerson;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TypePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typePerson = TypePerson::all();
        return response()->json($typePerson);
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
    public function store(TypePersonRequest $typePersonRequest)
    {
        try{
            $typePerson = TypePerson::find()->where('typePersonName','=',$typePersonRequest->typePersonName);
            if(!$typePerson->exist()){
                $typePersonNew = new TypePerson();
                $typePersonNew['typePersonName'] = $typePersonRequest->typePersonName;
                $typePerson->save();
                return response()->json([
                                        'status' => 'success',
                                        'message' => TypePersonMessage::successTypePersonCreate,
                                        'typePerson' => $typePerson
                ],201);
            }else{
                return response()->json([
                    'status' => 'fail',
                    'message' => TypePersonMessage::existTypePerson
                ],404);
            }
        }catch(ModelNotFoundException $eModel){
                return response()->json([
                    'status' => 'fail',
                    'message' => TypePersonMessage::failCreateTypePersonModel,
                    'error' => $eModel->getMessage()
                ],404);
        }catch(\Exception $eException){
                return response()->json([
                    'status' => 'fail',
                    'message' => TypePersonMessage::failCreateTypePersonExcept,
                    'error' => $eException->getMessage()
                ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $typePerson = TypePerson::findOrFail($id);
            return response()->json([
                                    'status' => 'success',
                                    'message' => TypePersonMessage::succcessFindTypePerson,
                                    'TypePerson' => $typePerson
            ],200);
        }catch(ModelNotFoundException $eModel){
            return response()->json([
                                    'status' => 'success',
                                    'message' => TypePersonMessage::failFindTypePerson,
                                    'error' => $eModel->getModel()
            ],404);
        }catch(\Exception $eException){
            return response()->json([
                                    'status' => 'success',
                                    'message' => TypePersonMessage::failFindTypePersonException,
                                    'error' => $eException->getMessage()
            ],500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypePerson $typePerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypePersonRequest $typePersonRequest, $id)
    {
        try{
            $typePerson = TypePerson::findOrFail($id);
            $dataTypePerson = $typePersonRequest->except(['_method','token']);
            $typePerson->update($dataTypePerson);
            return response()->json([
                                    'status' => 'success',
                                    'message' => TypePersonMessage::successUpdateTypePerson,
                                    'TypePerson' => $typePerson
            ], 201);
        }catch(ModelNotFoundException $eModel){
            return response()->json([
                'status' => 'fail',
                'message' => TypePersonMessage::failUpdateTypePersonModel,
                'error' => $eModel->getMessage()
            ], 404);
        }catch(\Exception $eException){
            return response()->json([
                'status' => 'fail',
                'message' => TypePersonMessage::failUpdateTypePersonException,
                'error' => $eException->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $typePerson = TypePerson::findOrFail($id);
            $typePerson->delete($typePerson);
            return response()->json([
                                    'status' => 'success',
                                    'message' => TypePersonMessage::successDeleteTypePerson,
                                    'TypePerson' => $typePerson
            ]);
        }catch(ModelNotFoundException $eModel){
            return response()->json([
                                    'status' => 'fail',
                                    'message' => TypePersonMessage::failDeleteTypePersonModel,
                                    'error' => $eModel->getMessage()
            ]);
        }catch(\Exception $eException){
            return response()->json([
                                    'status' => 'fail',
                                    'message' => TypePersonMessage::failDeleteTypePersonException,
                                    'error' => $eException->getMessage()
            ]);
        }
    }
}
