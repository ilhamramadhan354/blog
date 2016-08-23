<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(10);
       return view('products/index')->with('products', $products);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prodcts/create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),Product::valid());
        if($validate->fails()){
            return back()->withErrors($validate)
                         ->withInput();
        }else{

        $add = new Product();
        $add->name = $request['name'];
        $add->model = $request['model'];
        $add->desc = $request['desc'];

        $file       = $request->file('photo');
        $fileName   = $file->getClientOriginalName();
        $request->file('photo')->move("images/", $fileName);

        $add->photo = $fileName;
        $add->save();

        return redirect()->to('/');
        }
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Product::find($id);
        return view('products/show')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $show = Product::where('id', $id)->first();
        return view('products/edit')->with('show', $show);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Product::where('id',$id)->first();
        $update->name = $request['name'];
        $update->model = $request['model'];
        $update->desc = $request['desc'];

        if($request->file('photo') == "")
        {
            $update->photo = $update->photo;
        }else{
            $file       = $request->file('photo');
            $fileName   = $file->getClientOriginalName();
            $request->file('photo')->move("images/", $fileName);
            $update->photo = $fileName;
        }

        $update->update();

        return redirect()->to('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Product::find($id);
        $destroy->delete();

        return redirect()->to('/'); 
    }
}
