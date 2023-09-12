<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index():JsonResponse
    {
        return response()->json(User::all(), 200);
    }
    public function store(Request $request):JsonResponse
    {
        $user = User::create($request->all());
        return response()->json([
            'success'=> true,
            'data'=> $user
        ], 201);
    }

     public function create(Request $request):JsonResponse
     {
         $user = User::create([
             "name"=> $request->name,
             "email"=> $request->email,
             "password"=>Hash::make($request->password)
         ]);
         return response()->json([
             "status"=> true,
             "token"=> $user->createToken('api token')->plainTextToken,
        ], 200);
     }

    public function show($id):JsonResponse
    {

        $user = User::find($id);
        return response()->json( $user, 200);
    }

    public function update(Request $request, $id):JsonResponse
    {

        $user = User::find($id);
        $user-> name = $request->name;
        $user-> email = $request->email;
        $user-> password = $request->password;
        $user->save();

        return response()->json([
            'success'=> true,
            'data'=> $user
        ], 200);
    }

    public function destroy($id):JsonResponse
    {
        User::find($id)->delete();
        return response()->json([
            "success"=> true,
        ], 200);
    }
}
