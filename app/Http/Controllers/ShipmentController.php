<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelParticipant;
use App\Models\User;

class ShipmentController extends Controller
{
    public function createShipment(Request $request)
    {
        $rules = [
            'type' => 'required|string',
            'full_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'age' => 'nullable|integer',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'parcel_id' => 'required|integer',
        ];

        $validator = \Validator::make($request->input(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ], 422);
        }

        $parcelParticipant = ParcelParticipant::create([
            'type' => $request->type,
            'full_name' => $request->full_name,
            'date_of_birth' => $request->date_of_birth,
            'age' => $request->age,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'parcel_id' => $request->parcel_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Participant created successfully',
            'data' => $parcelParticipant
        ], 201);
    }

    public function updateShipment(Request $request, $id)
    {
        $rules = [
            'type' => 'required|string',
            'full_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'age' => 'nullable|integer',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'parcel_id' => 'required|integer',
        ];

        $validator = \Validator::make($request->input(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ], 422);
        }

        $parcelParticipant = ParcelParticipant::find($id);

        if (!$parcelParticipant) {
            return response()->json([
                'success' => false,
                'message' => 'Participant not found'
            ], 404);
        }

        $parcelParticipant->update([
            'type' => $request->type,
            'full_name' => $request->full_name,
            'date_of_birth' => $request->date_of_birth,
            'age' => $request->age,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'parcel_id' => $request->parcel_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Participant updated successfully',
            'data' => $parcelParticipant
        ], 200);
    }
}
