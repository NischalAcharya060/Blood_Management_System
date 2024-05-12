<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use Illuminate\Http\Request;

class AdminBloodRequestController extends Controller
{
    public function index()
    {
        $bloodRequests = BloodRequest::paginate(5);
        return view('admin.blood_request.index', compact('bloodRequests'));
    }

    public function show(BloodRequest $bloodRequest)
    {
        return view('admin.blood_request.show', compact('bloodRequest'));
    }


    public function edit(BloodRequest $bloodRequest)
    {
        return view('admin.blood_request.edit', compact('bloodRequest'));
    }

    public function update(Request $request, BloodRequest $bloodRequest)
    {
        $request->validate([
            'fulfilled' => 'required|boolean',
        ]);

        $bloodRequest->fulfilled = $request->fulfilled;
        $bloodRequest->save();

        return redirect()->route('admin.blood_requests.index')->with('success', 'Blood request status updated successfully.');
    }

    public function destroy(BloodRequest $bloodRequest)
    {
        $bloodRequest->delete();

        return redirect()->route('admin.blood_requests.index')
            ->with('success', 'Blood request deleted successfully.');
    }
}
