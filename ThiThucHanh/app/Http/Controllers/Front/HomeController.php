<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(){
        $products = Furniture::all();
        return view('index',compact('products'));
    }
    public function create(){
        $products = Furniture::all();
        return view('create', compact('products'));
    }
    public function store(Request $request){
        $request ->validate([
            'product_code'=>'required',
            'name'=>'required',
            'price'=>'required',
            'avatar'=>'required',
        ]);
        Furniture::create($request->all());
        return redirect()->route('create')
            ->with('success','Create success!');
    }

    public function search(Request $request){

        $search = $request->get('search');
        $products = DB::table('furniture')->where('product_code','like','%'.$search.'%')->paginate(10);

        return view('/create',compact('products',));
    }
}
