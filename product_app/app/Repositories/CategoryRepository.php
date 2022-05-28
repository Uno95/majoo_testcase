<?php
namespace App\Repositories;

use Ramsey\Uuid\Uuid;
use App\CategoryModel;

class CategoryRepository
{
    public function saveCategory($categoryName)
    {
        $generateUuid = Uuid::uuid4();
        $entity   = [
            "uuid" => $generateUuid->toString(),
            "category_name" => $categoryName
        ];

        $category = CategoryModel::create($entity);
        
        return $category;
    }

    public function fetchByUuid($uuid)
    {
        $categories = CategoryModel::where('uuid', $uuid)->first();
        return $categories;
    }

    public function fetchAllCategories()
    {
        $categories = CategoryModel::orderBy('created_at', 'desc')->get();
        return $categories;
    }

    public function updateCategory($categoryEntity, $categoryName)
    {
        $category = $categoryEntity->update(["categoryName" => $categoryName]);
        return $category;
    }

    public function deleteCategory($categoryEntity)
    {
        $category = $categoryEntity->delete();
        return true;
    }
}