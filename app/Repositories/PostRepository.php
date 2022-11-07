<?php

namespace App\Repositories;

use App\Repositories\PostInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class PostRepository implements PostInterface
{


    public function getPostById($id)
    {
        return Post::find($id);
    }

    public function createPost($request)
    {
        $post = new Post();
        $post->name = $request->name;
        if (!empty($request->image_file)) {
            $fileName = time() . '_' . $request->image_file->getClientOriginalName();
            $filePath = $request->file('image_file')->storeAs('uploads', $fileName, 'public');
           // $fileModel->name = time() . '_' . $request->image_file->getClientOriginalName();
            $post->image_file = '/storage/' . $filePath;
            //dd($request->image_file);
           // $file_name = $request->image_file['name'];
          //  $image = Storage::put($file_name, '', 'public');
        }
        // print_r($image);die;
      //  $post->image_file = $image;
        $post->save();
        return true;
    }
}
