<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository;
    }

    public function create()
    {
        $categoryCollection = $this->categoryRepository->fetchAllCategories();
        return view('backoffice.addCategory', compact('categoryCollection'));
    }

    public function store(Request $request)
    {
        $categoryName = $request->input('categoryName');
        $saveCategory = $this->categoryRepository->saveCategory($categoryName);

        $message = "success";
        if (!$saveCategory) {
            $message = "error";
        }

        $response = [
            "message" => $message
        ];

        return response()->json($response);
    }

    public function update(Request $request, $uuid)
    {
        $categoryEntity = $this->categoryRepository->fetchByUuid($uuid);

        $dataUpdate     = $request->input('categoryName');
        $updateCategory = $this->categoryRepository->updateCategory($categoryEntity, $dataUpdate);

        $message = "success";
        if (!$updateCategory) {
            $message = "error";
        }

        $response = [
            "message" => $message
        ];

        return response()->json($response);
    }
    public function delete(Request $request, $uuid)
    {
        $categoryEntity = $this->categoryRepository->fetchByUuid($uuid);
        $deleteCategory = $this->categoryRepository->deleteCategory($categoryEntity);

        $message = "success";
        if (!$deleteCategory) {
            $message = "error";
        }

        $response = [
            "message" => $message
        ];

        return response()->json($response);
    }
}
