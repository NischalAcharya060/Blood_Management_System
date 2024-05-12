<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;
use App\Models\BloodRequest;

class BloodRequestController extends Controller
{
    public function create()
    {
        return view('user.blood_request.create_blood_request');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'blood_type' => 'required|string',
                'quantity' => 'required|integer',
                'hospital_location' => 'required|string',
                'patient_name' => 'required|string',
                'age' => 'required|integer',
                'contact_info' => 'required|string',
            ]);

            $requestData = $request->all();
            BloodRequest::create($requestData);

            return redirect()->route('blood_requests.create')->with('success', 'Blood request created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the blood request: ' . $e->getMessage());
        }
    }

}
