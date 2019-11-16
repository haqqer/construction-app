<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends RespondController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $comments = Comment::with(['post'])->paginate();
            return $this->sendResponse(true, "get all comments", 200, $comments);
        } catch (Exception $e) {
            return $this->sendResponse(false, "error get all comments", 500, $e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Comment::create($request->all());
        return $this->sendResponse(true, "create post", 201, $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $post)
    {
        $post->update($request->all());
        return $this->sendResponse(true, "update post", 200, $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $post)
    {
        $post->delete();
        return $this->sendResponse(true, "delete post", 204, $post);
    }
}
