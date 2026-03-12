<?php
namespace App\Http\Controllers;
        use App\Models\Post;
        use Illuminate\Http\Request;

        class PostController extends Controller
        {
            public function index()
            {
                $posts = Post::all();

                return view('posts.index' , ['posts' => $posts]);
            }


            public function show(Post $id)
            {
                return view('posts.show' , ['post' => $id]);
            }

            public function create()
            {
                return view('posts.create');
            }

            public function store()
            {
                $data = request()->all();
                // dd($data);
                return to_route('posts.index');
            }

            public function edit()
            {
                return view('posts.edit');
            }

            public function update()
            {
                $data = request()->all();
                // dd($data);
                return to_route('posts.show' , 1);
            }

            public function destroy()
            {
                return to_route('posts.index');
            }


        }
