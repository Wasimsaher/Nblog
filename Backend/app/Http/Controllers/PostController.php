<?php
namespace App\Http\Controllers;
        use App\Models\Post;
        use Illuminate\Http\Request;

        class PostController extends Controller
        {
            public function index()
            {
                $post = new Post();

                $post->title = "Laravel";
                $post->description = "Nice Framework";

                $post->save();

                $PostsFromDB = Post::all();
                $allposts = [
                    [
                        'id' => 1,
                        'title' => 'PHP',
                        'posted_by' => 'Ahmed',
                        'created_at' => '2026-02-01'
                    ],
                    [
                        'id' => 2,
                        'title' => 'Javascript',
                        'posted_by' => 'Mohamed',
                        'created_at' => '2026-02-02'
                    ],
                    [
                        'id' => 3,
                        'title' => 'HTML',
                        'posted_by' => 'Mahmoud',
                        'created_at' => '2026-02-03'
                    ],
                    [
                        'id' => 4,
                        'title' => 'CSS',
                        'posted_by' => 'Ali',
                        'created_at' => '2026-02-04'
                    ],
                ];

                return view('posts.index' , ['posts' => $allposts]);
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
