<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Product;
use Log;
use App\Consts;

class ProductService
{
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
}
