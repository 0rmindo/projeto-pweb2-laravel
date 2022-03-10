<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller {
  public function productsPerCategory() {
    $productsPerCategory = (object) [];
    $products = Product::all();

    if (sizeof($products) > 0) {
      for ($i = 0; $i < sizeof($products); $i++) {
        $categoryName = $products[$i]->category;
        $categoryAlreadyExists = isset($productsPerCategory->$categoryName);
        $categoryValue = $categoryAlreadyExists ? $productsPerCategory->$categoryName + 1 : 1;
        $productsPerCategory->$categoryName = $categoryValue;
      }
    }

    return json_encode($productsPerCategory);
  }
}
