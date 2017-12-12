<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Consts;
use App\CategoryProduct;
use Log;
use Illuminate\Http\Exceptions\PostTooLargeException;
use DB;
use App\Services\UploadService;

class ManageController extends Controller
{
    public function __construct(UploadService $uploadService)
    {
        $this->middleware('auth');
        $this->uploadService = $uploadService;
    }

    public function index()
    {
        return view('manage.index');
    }

    public function store(Request $request)
    {
        try {
            if($request->hasFile('file_img')) {
                $pro = new Product();
                $pro->title = $request['title'];
                $pro->description = $request['description'];
                $pro->cat_id = $request['cat_id'];
                $pro->thumbnail = $this->uploadService->uploadImg($request['thumbnail']);
                $pro->save();
                $this->addImagesPro($pro->id, $request['file_img']);
                return redirect()->route('pro-list');
            }
            return back();
        } catch (PostTooLargeException $e) {
            return 'File too large!';
        }
    }

    public function addImagesPro($proId, $files)
    {
        $data = [];
        foreach ($files as $file) {
            $data[] = [
                'pro_id' => $proId,
                'pro_img' => $this->uploadService->uploadImg($file)
            ];
        }
        DB::table('image_product')->insert($data);
    }

    public function getList()
    {
        $products = Product::paginate(Consts::LIMIT);
        return view('manage.list-pro', ['products' => $products]);
    }

    public function addLayout()
    {
        $categories = CategoryProduct::all();
        return view('manage.add_pro', ['categories' => $categories]);
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request['id']);
        $this->removeImg($request['id']);
        $product->delete();
        return redirect()->route('pro-list');
    }

    public function removeImg($proId)
    {
        DB::table('image_product')->where('pro_id', $proId)->delete();
        return;
    }
}
