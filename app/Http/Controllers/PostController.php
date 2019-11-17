<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends RespondController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if($request->query('project_id')) {
                $posts = Post::with(['project', 'user'])->where('project_id', $request->query('project_id'))->paginate();    
            }
            else 
            {
                $posts = Post::with(['project', 'user'])->paginate();
            }
            return $this->sendResponse(true, "get all posts", 200, $posts);
        } catch (Exception $e) {
            return $this->sendResponse(false, "error get all posts", 500, $e);
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
        $post = Post::create($request->all());
        return $this->sendResponse(true, "create post", 201, $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $this->sendResponse(true, "show post", 200, $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return $this->sendResponse(true, "update post", 200, $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return $this->sendResponse(true, "delete post", 204, $post);
    }

    public function filter(Request $request) 
    {
        if($request->query('name') && $request->query('description') && $request->query('status'))
        {
            $name = strtolower($request->query('name'));
            $description = strtolower($request->query('description'));
            $status = strtolower($request->query('status'));
            $match = [['name', 'like', '%'.$name.'%'], ['description', 'like', '%'.$description.'%'], ['status', '=', $status]];
            $result = Post::where($match)->get();
        }
        else if($request->query('title'))
        {
            $value = strtolower($request->query('title'));
            $result = Post::where('title', $value)->orWhere('title', 'like', '%'.$value.'%')->get();
        }
        else if($request->query('description'))
        {
            $value = strtolower($request->query('description'));
            $result = Post::where('description', $value)->orWhere('description', 'like', '%'.$value.'%')->get();
        }
        else if($request->query('type'))
        {
            $value = strtolower($request->query('type'));
            $result = Post::where('type', $value)->orWhere('type', $value)->get();            
        }
        else if($request->query('status'))
        {
            $value = strtolower($request->query('status'));
            $result = Post::where('status', $value)->get();            
        }
        else 
        {
            return $this->index();
        }
        return $this->sendResponse(true, "count project", 200, $result);
    }

    public function count(Request $request)
    {
        if($request->query('status'))
        {
            $result = Post::where('status', $request->query('status'))->get();
        }
        else if($request->query('type'))
        {
            $result = Post::where('type', $request->query('type'))->get();
        }
        else 
        {
            $result = Post::all();
        }
        $count = count($result);
        return $this->sendResponse(true, "count post", 200, ['count' => $count]);
    }
}
