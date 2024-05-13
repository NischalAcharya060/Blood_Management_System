<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\User;
use App\Models\BloodRequest;
use Illuminate\Http\Request;

class BloodRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = BloodRequest::query();

        // Search
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('patient_name', 'LIKE', "%$searchTerm%")
                    ->orWhere('hospital_name', 'LIKE', "%$searchTerm%")
                    ->orWhere('hospital_location', 'LIKE', "%$searchTerm%");
            });
        }

        // Filter by Blood Type
        if ($request->has('blood_type')) {
            $bloodType = $request->input('blood_type');
            $query->where('blood_type', $bloodType);
        }

        $bloodRequests = $query->paginate(10);

        return view('user.blood_request.index', compact('bloodRequests'));
    }

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

    public function show(BloodRequest $bloodRequest)
    {
        return view('user.blood_request.show', compact('bloodRequest'));
    }

    public function markAsDonor(Request $request, BloodRequest $bloodRequest)
    {
        $user = $request->user();
        // Update user role to "donor"
        $user->assignRole('donor');

        // Optionally, you can update the blood request status
        $bloodRequest->update(['fulfilled' => true]);

        return redirect()->route('user.blood_request.show', $bloodRequest->id)->with('success', 'You have successfully marked yourself as a donor.');
    }

}
