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
use App\Services\ProductService;
use App\ImageProduct;

class ManageController extends Controller
{
    public function __construct(UploadService $uploadService, ProductService $productService)
    {
        $this->middleware('auth');
        $this->uploadService = $uploadService;
        $this->productService = $productService;
    }

    public function index()
    {
        return view('manage.index');
    }

    public function store(Request $request)
    {
        try {
            if($request->hasFile('file_img')) {
                $pro = $this->productService->store($request);
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
        $products = $this->productService->getList();
        return view('manage.list-pro', ['products' => $products]);
    }

    public function addLayout()
    {
        return view('manage.add_pro', ['categories' => CategoryProduct::all()]);
    }

    public function destroy(Request $request)
    {
        $this->productService->destroy($request);
        $this->removeImg($request['id']);
        return redirect()->route('pro-list');
    }

    public function removeImg($proId)
    {
        ImageProduct::where('pro_id', $proId)->delete();
        return;
    }
}
