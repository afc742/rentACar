<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(12);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'type' => 'required',
            'trans' => 'required',
            'seats' => 'required',
            'doors' => 'required',
            'desc'=> 'required',
            'car_img' => 'image|max:1999|required',
            'lat'=> 'required',
            'lng'=> 'required',
            'location' => 'required',
            'petF' => 'required',
        ]);
        if($request->hasFile('car_img'))
        {
        //Handle File Upload
            //Get filename with ext
            $filenameWithExt = $request->file('car_img')->getClientOriginalName();
            //Get just filname
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('car_img')->getClientOriginalExtension();
            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Img
            $path = $request->file('car_img')->storeAs('public/car_images', $filenameToStore);       
        }
        //Create Post
        $post = new Post;
        $post->year = $request->input('year');
        $post->make = $request->input('make');
        $post->model = $request->input('model');
        $post->type = $request->input('type');
        $post->trans = $request->input('trans');
        $post->seats = $request->input('seats');
        $post->doors = $request->input('doors');
        $post->desc = $request->input('desc');
        $post->car_img = $filenameToStore;
        $post->lat = $request->input('lat');
        $post->lng = $request->input('lng');
        $post->location = $request->input('location');
        $post->petF = $request->input('petF');
        $post->save();

        return redirect('/posts')->with('success', 'Listing Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')-> with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
