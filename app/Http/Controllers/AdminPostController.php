<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**De relaties meegeven in de with, Package van Barry!!**/
        $posts = Post::with(['photo','categories','user'])->filter(request(['search']))->paginate(15);
        //$posts = Post::with(['photo','categories','user'])->withTrashed()->paginate(15);
        /*Session::flash('user_message', 'No posts found');*/
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $keywords = Keyword::all();
        return view('admin.posts.create', compact('categories','keywords'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($post->title,'-');
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;

        /*code voor user_photo*/

        /*if(Auth::user()->photo){
            $post->photo_id = Auth::user()->photo->id;
        }else{
            $post->photo_id = 1;
        }*/

        /*Code om foto op te slaan*/

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('img', $name);

            $photo = Photo::create(['file' => $name]);
            $post->photo_id = $photo->id;
        }

        $post->save();

        $post->categories()->sync($request->categories, false);
        //$post->keywords()->sync($request->keywords, false);

        session::flash('user_message', $post->title . ' was created!');

        foreach($request->keywords as $keyword){
            $keywordfind = Keyword::findOrFail($keyword);
            // onderstaande lijn zorgt ervoor dat we via het model van Post de methode keywords gebruiken, de methode keywords bevat morphtomany, morphtomany zorgt ervoor dat je kan wegschrijven in de ables tabel.
            $post->keywords()->save($keywordfind);
        }

        return redirect()->route('posts.index');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        /*$post->update($request->all());*/
        $post->title = $request->title;
        $post->slug = Str::slug($post->title,'-');
        $post->body = $request->body;

        /*photo opslaan*/

        if ($file = $request->file('photo_id')) {
            /** opvragen oude img **/
            $oldImage = Photo::find($post->photo_id);
            if ($oldImage) {
                //oude foto fysisch verwijderen uit img directory
                unlink(public_path() . $oldImage->file);
                //oude image uit de tabel photos verwijderen
                $oldImage->delete();
            }
            //vanaf hier wordt de nieuwe photo opgeslagen.
            $name = time() . $file->getClientOriginalName();
            $file->move('img', $name);

            $photo = Photo::create(['file' => $name]);
            $post->photo_id = $photo->id;
        }
       $post->update();


        /*Wegschrijven  tusssentabel met nieuwe rollen*/
        $post->categories()->sync($request->categories, true);

        session::flash('user_message', $post->title . ' was edited!');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->photo){
            unlink(public_path() . $post->photo->file); //fysiek verwijderen uit de img-directory
            $post->photo->delete();                                // photo deleten uit photo-table
        }

       //categories on cascade verwijdert!!

        $post->delete();
        return redirect('/admin/posts');
    }
    public function post(Post $post){
        //$post = Post::findOrFail($id);
        $post->load(['postcomments.user','postcomments.replies','postcomments.replies.user']);
        $categories = Category::all();
        return view('post', compact('post', 'categories'));
    }
}
