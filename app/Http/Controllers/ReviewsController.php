<?php

namespace App\Http\Controllers;
//use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;


class ReviewsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index():JsonResponse
    {
        return response()->json(Review::all(), 200);

    }

public function create(Request $request):JsonResponse
    {
        $review = Review::create([
            "title"=> $request->title,
            "content"=> $request->content,
            "id_user"=>$request->id_user,
            "rating"=>$request->rating,
        ]);
        return response()->json([
            "status"=> true,
       ], 200);
    }

    public function store(Request $request):JsonResponse
    {
        $review = Review::create($request->all());
        return response()->json([
            'success'=> true,
            'data'=> $review
        ], 201);
    }

    public function show(string $id):JsonResponse
    {
        $review = Review::find($id);
        return response()->json( $review, 200);
    }

    public function update(Request $request, $id):JsonResponse
    {

        $review = Review::find($id);
        $review-> title = $request->title;
        $review-> content = $request->content;
        $review-> id_user = $request->id_user;
        $review-> rating = $request->rating;
        $review->save();

        return response()->json([
            'success'=> true,
            'data'=> $review
        ], 200);
    }

    public function destroy($id):JsonResponse
    {
        Review::find($id)->delete();
        return response()->json([
            "success"=> true,
        ], 200);
    }
}
