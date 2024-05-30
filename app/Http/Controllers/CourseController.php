<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    public function book(Course $course)
    {
        $user = Auth::user();
        // $user = User::find($user->id);
        // Verifica se l'utente ha già prenotato il corso
        $existingBooking = $user->courses()->where('course_id', $course->id)->first();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'You have already booked this course.');
        }

        // Aggiunge la prenotazione
        $user->courses()->attach($course->id, ['status' => 'pending']);

        return redirect()->back()->with('success', 'Course booked successfully.');
    }
}
