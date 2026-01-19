<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GolfCourse;
use App\Http\Resources\GolfCourseResource;

class GolfCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        $courses = GolfCourse::where('is_active', true)->paginate(5);

        return response()->json([
        'success' => true,
        'data' => GolfCourseResource::collection($courses),
        'meta' => [
           'current_page' => $courses->currentPage(),
           'last_page' => $courses->lastPage(),
           'total' => $courses->total(),
        ]

    ], 200);

=======
        $courses = GolfCourse::all();
        return response()->json($courses);
>>>>>>> 4c2d62428b1a340ac65bab8934c0acbaad4722f2
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = GolfCourse::all();
        return response()->json($courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = GolfCourse::find($id);
        return response()->json($course);
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
