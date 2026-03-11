<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

/**
        *   Like/Unlike Golf Course
        *
        * This endpoint is used for liking or unliking a golf course.
        *
        * it returns the updated golf course details.
        *
        * For the protected routes, include the following header:
        * `Authorization: Bearer {token}`
        *
        * @authenticated
        */
    public function toggleLike(Request $request, int $id)
    {
    $user = $request->user(); 
    $course = GolfCourse::findOrFail($id);

    // Check if the user already liked the course
    if ($user->likedCourses()->where('golf_course_id', $id)->exists()) {
        // Unlike: detach from pivot table
        $user->likedCourses()->detach($id);
        $course->decrement('likes_count'); // optional if you keep a counter
        $liked = false;
    } else {
        // Like: attach to pivot table
        $user->likedCourses()->attach($id);
        $course->increment('likes_count'); // optional if you keep a counter
        $liked = true;
    }

    return response()->json([
        'success' => true,
        'liked' => $liked,
        'likes_count' => $course->likes_count,
    ]);
}

/**
            * Get a user's liked courses
            *
            * This endpoint allows the authenticated user to view their liked courses.
            *
            * it returns a list of the user's liked courses.
            *
            * For the protected routes, include the following header:
            * `Authorization: Bearer {token}`
            */
    public function likedCourses(Request $request)
{
    $user = Auth::user();
    /** @var \App\Models\User $user */
    $likedCourseIds = $user->likedCourses()->pluck('golf_course_id');
    return response()->json([
        'liked_course_ids' => $likedCourseIds,
        'message' => 'User liked courses retrieved successfully.'
    ], 200);
}


}
