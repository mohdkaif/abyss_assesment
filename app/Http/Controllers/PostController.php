<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    private PostInterface $PostRepository;

    public function __construct(PostInterface $PostRepository)
    {
        $this->PostRepository = $PostRepository;
    }

    public  function index()
    {
        dd('ds');
    }
    public  function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'     => 'required|max:50',
                'image_file'     => 'required|max:5120',
                'description'     => 'required|max:250',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                    'status' => Response::HTTP_BAD_REQUEST,
                ], Response::HTTP_BAD_REQUEST);
            }

            $this->PostRepository->createPost($request);

            return response()->json([
                'data'   => $request->all(),
                'status' => Response::HTTP_CREATED,
            ], Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return response()->json([$exception->getMessage(), Response::HTTP_OK]);
        }
    }
}
