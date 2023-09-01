<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
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
    public function store(StoreCommentRequest $request)
    {
        $comment = $request->name;
        $user_id = $request->user_id;
        $target = $request->target;

        $request->validate([
            'comment'=>'required',
            'target'=>'required',
            'user_id'=>'required',
        ]);
        
        try{
            Comment::create($request->post());
            $allcomment = Comment::all()->where('target', 'C++');
            return response()->json([
                'message' => 'Comment Inserted Successfully!',
                'comment' => $request->post(),
                'allcomment' => $allcomment,

            ]);
            
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something goes wrong while registering student'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
