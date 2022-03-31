<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Keyword;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $keywords = Keyword::all();
        $productcategories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('keywords', 'brands', 'productcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Product();
        $product->name = $request->name;
       // $product->slug = Str::slug($product->name,'-');
        $product->body = $request->body;
        $product->product_category_id = $request->category;
        $product->brand_id = $request->brand;
       // $product->user_id = Auth::user()->id;

        /*code voor user_photo*/

        /*if(Auth::user()->photo){
            $post->photo_id = Auth::user()->photo->id;
        }else{
            $post->photo_id = 1;
        }*/

        /*Code om foto op te slaan*/

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('img/products/', $name);

            $photo = Photo::create(['file' => $name]);
            $product->photo_id = $photo->id;
        }

        $product->save();

        //$product->categories()->sync($request->categories, false);
        //$post->keywords()->sync($request->keywords, false);

        session::flash('user_message', $product->name . ' was created!');

        foreach($request->keywords as $keyword){
            $keywordfind = Keyword::findOrFail($keyword);
            // onderstaande lijn zorgt ervoor dat we via het model van Post de methode keywords gebruiken, de methode keywords bevat morphtomany, morphtomany zorgt ervoor dat je kan wegschrijven in de ables tabel.
            $product->keywords()->save($keywordfind);
        }

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
