<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypologyRequest;
use App\Message\TypologyMessage;
use App\Models\Typologies;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TypologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typologies = Typologies::all();
        return response()->json($typologies);
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
    public function store(TypologyRequest $typologyRequest)
    {
        try{
            $typologyFind = Typologies::find()->where('typologyName','=', $typologyRequest->typologyName);
            if(!$typologyFind->exists()){
                $typology = new Typologies();
                $typology['$typologyName '] = $typologyRequest->typologyName;
                $typology->save();
                return response()->json([
                                        'status' => 'success',
                                        'message' => TypologyMessage::successTypologyCreate,
                                        'Typology' => $typology
                ],201);
            }

        }catch(ModelNotFoundException $eModel){
                return response()->json([
                                        'status' => 'fail',
                                        'message' => TypologyMessage::failCreateTypologyModel,
                                        'error' => $eModel->getMessage()
                ],404);

        }catch(\Exception $eException){
                return response()->json([
                                        'status' => 'fail',
                                        'message' => TypologyMessage::failCreateTypologyExcept,
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
            $typology = Typologies::findOrFail($id);
            return response()->json([
                                    'status' => 'success',
                                    'message' => TypologyMessage::succcessFindTypology,
                                    'Typology' => $typology
            ],200);
        }catch(ModelNotFoundException $eModel){
            return response()->json([
                                    'status' => 'fail',
                                    'message' => TypologyMessage::failFindTypology,
                                    'error' => $eModel->getMessage()
            ],404);
        }catch(\Exception $eException){
            return response()->json([
                'status' => 'fail',
                'message' => TypologyMessage::failFindTypologyException,
                'error' => $eException->getMessage()
            ],500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Typologies $typologies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypologyRequest $typologyRequest, $id)
    {
        try{
            $dataTypology = $typologyRequest->except(['_method','token']);
            $typology = Typologies::findOrFail($id);
            $typology->update($dataTypology);
            $typology = Typologies::findOrFail($id);
            return response()->json([
                                    'status' => 'success',
                                    'message' => TypologyMessage::successUpdateTypology,
                                    'Typology' => $typology
            ],201);
        }catch(ModelNotFoundException $eModel){
            return response()->json([
                                    'status' => 'fail',
                                    'message' => TypologyMessage::failUpdateTypologyModel,
                                    'error' => $eModel->getMessage()
            ],404);
        }catch(\Exception $eException){
            return response()->json([
                'status' => 'fail',
                'message' => TypologyMessage::failUpdateTypologyException,
                'error' => $eException->getMessage()
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $typology = Typologies::findOrFail($id);
            $typology->delete($id);
            return response()->json([
                                    'status' => 'success',
                                    'message' => TypologyMessage::successDeleteTypology,
                                    'Typology' => $typology
            ],201);
        }catch(ModelNotFoundException $eModel){
            return response()->json([
                                    'status' => 'fail',
                                    'message' => TypologyMessage::failDeleteTypologyModel,
                                    'error' => $eModel->getMessage()
            ],404);
        }catch(\Exception $eException){
            return response()->json([
                'status' => 'fail',
                'message' => TypologyMessage::failDeleteTypologyException,
                'error' => $eException->getMessage()
        ],500);
        }
    }
}
