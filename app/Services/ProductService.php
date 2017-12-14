<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Product;
use Log;
use App\Consts;
use App\Services\UploadService;

class ProductService
{
    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function getALl()
    {
        $products = Product::join('category_products', 'category_products.id', '=', 'products.cat_id')
                            ->select('products.id', 'title', 'thumbnail', 'description', 'category_products.name')
                            ->limit(Consts::HOME_LIMIT)
                            ->get();
        return $products;
    }

    public function getSlideProduct()
    {
        $products = Product::limit(Consts::SLIDE_LIMIT)->get();

        return $products;
    }

    public function getLastestProduct()
    {
        $products = Product::join('category_products', 'category_products.id', '=', 'products.cat_id')
                            ->select('products.id', 'title', 'thumbnail', 'description', 'category_products.name')
                            ->limit(Consts::LIMIT)
                            ->orderByRaw('products.id DESC')
                            ->get();
        return $products;
    }

    public function getProByCat($codeId)
    {
        $product = Product::join('category_products', 'category_products.id', '=', 'products.cat_id')
                            ->select('products.id', 'title', 'thumbnail', 'description', 'category_products.name')
                            ->limit(Consts::HOME_LIMIT)
                            ->where('category_products.code_id', $codeId)
                            ->get();
        return $product;
    }

    public function getProById($id)
    {
        $product = Product::join('category_products', 'category_products.id', '=', 'products.cat_id')
                            ->select('products.id', 'title', 'thumbnail', 'description', 'category_products.name')
                            ->with('imageProducts')
                            ->where('products.id', $id)
                            ->first();
        return $product;
    }

    public function store($request)
    {
        $pro = new Product();
        $pro->title = $request['title'];
        $pro->description = $request['description'];
        $pro->cat_id = $request['cat_id'];
        $pro->thumbnail = $this->uploadService->uploadImg($request['thumbnail']);
        $pro->save();
        return $pro;
    }

    public function getList()
    {
        return Product::paginate(Consts::LIMIT);
    }

    public function destroy($request)
    {
        $product = Product::findOrFail($request['id']);
        $product->delete();
    }

    public function productSearch($request)
    {
        $query = Product::query();

        if($request['search'])
        {
            $query = $this->searchProductsFulltext($request['search']);
        }
        return $query->paginate(50);
    }

    public function searchProductsFulltext($string)
    {
        return Product::whereRaw('MATCH (title, description) AGAINST ("'.$string.'")');
    }
}
