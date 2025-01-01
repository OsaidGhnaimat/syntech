<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\GetUsersByRoleName;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.students.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        try
        {
            $user = User::insertUser($request);
            // but the student info and create row
            $user->assignRole('student');
            return redirect()->back()->with('success', 'Student inserted successfully!');
        } catch (\Exception $e) {
            Log::error('Error inserting student: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to insert student. Please try again.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
