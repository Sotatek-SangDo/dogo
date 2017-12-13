<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Services\ProductService;
use Log;

class ProductController extends Controller
{
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('welcome', [
            'allProduct' => $this->productService->getAll(),
            'slideProducts' => $this->productService->getSlideProduct(),
            'lastestPros' => $this->productService->getLastestProduct()
        ]);
    }

    public function getProByCat($codeId)
    {
        $products = $this->productService->getProByCat($codeId);

        return view('layouts.show_pro_by_cat', ['products' => $products]);
    }

    public function detail($id)
    {
        $product = $this->productService->getProById($id);

        return view('layouts.detail', ['product' => $product]);
    }
}
