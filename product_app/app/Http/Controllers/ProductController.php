<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class ProductController extends Controller
{
    protected $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository;
    }

    public function create(Request $request)
    {
        $bodyRequest = $request->all();
        $categoryCollection = $this->categoryRepository->fetchAllCategories();
        return view('backoffice.addProduct', compact('categoryCollection'));
    }
    
    public function store(Request $request)
    {
        $bodyRequest = $request->all();
    }
}
