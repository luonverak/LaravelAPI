<?php

namespace App\Http\Controllers;

use App\Models\PeopleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{


    public function index()
    {
        $people = PeopleModel::all();
        if ($people->count() > 0) {
            return response()->json($people);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No data'
            ], 404);
        }
    }
    public function addData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|text',
            'last_name' => 'required|text',
            'gender' => 'required|text',
            'age' => 'required|integer',
            'address' => 'required|text',
        ]);
        if ($validator->failed()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $people = PeopleModel::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'age' => $request->age,
                'address' => $request->address,
            ]);
            if ($people) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Add success'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Somethings wrong'
                ], 500);
            }
        }
    }
    public function search($id)
    {
        $people = PeopleModel::find($id);
        if ($people) {
            return response()->json([
                'status' => 200,
                'people' => $people
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'People not found'
            ], 404);
        }
    }
    public function updateData(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|text',
            'last_name' => 'required|text',
            'gender' => 'required|text',
            'age' => 'required|integer',
            'address' => 'required|text',
        ]);
        if ($validator->failed()) {
            return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ], 422);
        } else {
            $people = PeopleModel::find($id);
            if ($people) {
                $people->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'age' => $request->age,
                    'address' => $request->address,
                ]);
                if ($people) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Update success'
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 500,
                        'message' => 'Somethings wrong'
                    ], 500);
                }
            }

        }
    }
    public function deleteData($id)
    {
        $people = PeopleModel::find($id);
        if ($people) {
            $people->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Delete success'
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Somethings wrong'
            ], 500);
        }
    }
}
