<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GolfCourse;
use App\Http\Resources\GolfCourseResource;

/**
 * @tags Golf Courses
 */
class GolfCourseController extends Controller
{
     /**
     * List Golf Courses
     *
     * This endpoint is used for listing active golf courses.
     *
     * it returns a paginated list of golf courses.
     *
     * For the protected routes, include the following header:
     * `Authorization: Bearer {token}`
     *
     * @unauthenticated
     */
    public function index()
    {
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
    }
    
        /**
        * Get Golf Course Details
        *
        * This endpoint is used for retrieving details of a specific golf course by its ID.
        *
        * it returns the golf course details, including its holes and their respective pars.
        *
        * For the protected routes, include the following header:
        * `Authorization: Bearer {token}`
        *
        * @unauthenticated
        */
    public function getCourse(int $id)
    {
        $course = GolfCourse::findorFail($id);


        return response()->json([
            'success' => true,
            'data' => new GolfCourseResource($course),

        ]);

    }

  /**
        * Create Golf Course
        *
        * This endpoint is used for creating a new golf course.
        *
        * it returns the newly created golf course details.
        *
        * For the protected routes, include the following header:
        * `Authorization: Bearer {token}`
        *
        * @unauthenticated
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
