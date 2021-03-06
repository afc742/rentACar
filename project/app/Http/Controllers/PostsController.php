<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
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
            'price' => 'required',
            'odometer' => 'required',
            'roof_r'=> 'required',
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
        $post->user_id = auth()->user()->id;
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
        $post->price = $request->input('price');
        $post->odometer = $request->input('odometer');
        $post->roof_r = $request->input('roof_r');
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
        $post = Post::find($id);

        // check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit')-> with('post', $post);
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
            'odometer' => 'required',
            'roof_r'=> 'required',
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
        //Find Post
        $post = Post::find($id);
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
        $post->odometer = $request->input('odometer');
        $post->roof_r = $request->input('roof_r');
        $post->save();

        return redirect('/posts')->with('success', 'Listing Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Listing Removed');
    }

    public function search(Request $request)
    {
        if($request->petF == 1){
            $pets = 1;
        }
        else{
            $pets = 0;
        }
        if($request->roof_r == 1){
            $racks = 1;
        }
        else{
            $racks = 0;
        }
        if($request->trans == 'Both')
        {
            if($pets == 1 && $racks == 0){
                $posts = Post::where('petF', $pets)
                            ->paginate(12);
                return view('posts.index')->with('posts', $posts);
            }
            if($racks == 1 && $pets == 0){
                $posts = Post::where('roof_r', $racks)
                            ->paginate(12);
                return view('posts.index')->with('posts', $posts);
            }
            if($racks == $pets){
                $posts = Post::where('petF', $pets)
                            ->where('roof_r', $racks)
                            ->paginate(12);
                return view('posts.index')->with('posts', $posts);
            }
        }
        else{
            if($pets == 1 && $racks == 0){
                $posts = Post::where('petF', $pets)
                             ->where('trans', $request->trans)
                             ->paginate(12);
                return view('posts.index')->with('posts', $posts);
            }
            if($racks == 1 && $pets == 0){
                $posts = Post::where('roof_r', $racks)
                             ->where('trans', $request->trans)
                             ->paginate(12);
                return view('posts.index')->with('posts', $posts);
            }
            if($racks == $pets){
                $posts = Post::where('petF', $pets)
                             ->where('roof_r', $racks)
                             ->where('trans', $request->trans)
                             ->paginate(12);
                return view('posts.index')->with('posts', $posts);
            }
        }
    }
}
