<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
  // 제품 목록 가져오기 (Read)
  public function index()
  {
      return Product::all();
  }

  // 새 제품 추가 (Create)
  public function store(Request $request)
  {
      $validatedData = $request->validate([
          'name' => 'required|max:255',
          'description' => 'required',
          'price' => 'required|numeric'
      ]);

      return Product::create($validatedData);
  }

  // 특정 제품 가져오기 (Read)
  public function show(Product $product)
  {
      return $product;
  }

  // 제품 업데이트 (Update)
  public function update(Request $request, Product $product)
  {
      $validatedData = $request->validate([
          'name' => 'required|max:255',
          'description' => 'required',
          'price' => 'required|numeric'
      ]);

      $product->update($validatedData);

      return $product;
  }

  // 제품 삭제 (Delete)
  public function destroy(Product $product)
  {
      $product->delete();

      return response()->json(['message' => 'Product deleted successfully']);
  }
}
