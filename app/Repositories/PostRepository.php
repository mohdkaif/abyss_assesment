<?php

namespace App\Repositories;

use App\Repositories\PostInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class PostRepository implements PostInterface
{


    public function getPostById($id)
    {
        return Post::Select('name', 'description', 'type', 'image_file')->find($id);
    }

    public function createPost($request)
    {
        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->type = $request->type;
        if (!empty($request->image_file)) {
            $fileName = time() . '_' . $request->image_file->getClientOriginalName();
            $filePath = $request->file('image_file')->storeAs('uploads', $fileName, 'private');
            $post->image_file = '/storage/' . $filePath;
        }
        $post->save();
        $data['name'] = $post->name;
        $data['description'] = $post->description;
        $data['type'] = $post->type;
        return $data;
    }

    public function getPostByPagination($request)
    {
        $limit = $request->limit ? $request->limit : 10;
        $page = $request->page && $request->page > 0 ? $request->page : 1;
        $skip = ($page - 1) * $limit;
        $posts = Post::Select('name', 'description', 'type')->offset($skip)->limit($limit)->get();
        return $posts;
    }
}
