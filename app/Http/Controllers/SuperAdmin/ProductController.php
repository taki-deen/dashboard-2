<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return $this->data();
        }
        return view('super-admin.products.index');
    }

    private function data()
    {
        $products = Product::all();

        return DataTables::of($products)
            ->addColumn('name', function ($product) {
                return $product->name;
            })
            ->addColumn('description', function ($product) {
                return $product->description;
            })
            ->addColumn('stock', function ($product) {
                return $product->stock;
            })
            ->addColumn('price', function ($product) {
                return $product->price;
            })
            ->addColumn('action', function ($product) {
                return "<button class='btn'> edit</button>";
            })

            ->make(true);
    }


    public function create(Request $request)
    {

        try {
            Product::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'price'=>$request->price,
                'stock'=>$request->stock,
                'user_id'=>Auth::user()->id,
            ]);
            return response()->json(['status' => true, 'message' => "Product created Successfuly"], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 200);
        }
    }
    public function edit($id){
        $product = Product::find($id);
        return response()->json(['status' => true, 'data' => $product], 200);
    }

    
}
