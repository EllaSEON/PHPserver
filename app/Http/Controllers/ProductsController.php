<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
  // 제품 목록 가져오기 
  public function index()
  {
    $products = Product::all(); // Product 모델에 있는 테이블에 있는 모든 상품 조회
    return response()->json($products);
  }

    // 새 상품 추가
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:15',
            'description' => 'required|max:50',
            'price' => 'required|integer'
        ]);

        $product = Product::create($validatedData);

        return response()->json($product, 201);
    }

    // 제품 정보 수정
    public function update(Request $request, $id)
    {
        // 유효성 검사
        $validatedData = $request->validate([
            'name' => 'required|max:15',
            'description' => 'required|max:50',
            'price' => 'required|integer'
        ]);

        // 제품 찾기, 없으면 404 응답
        $product = Product::findOrFail($id);

        // 제품 정보 업데이트
        $product->update($validatedData);

        // 업데이트된 제품 정보 반환
        return response()->json($product, 200);
    }



    // 제품 삭제 
    public function destroy($id)
        {
            $product = Product::findOrFail($id);
            $product->delete();

            return response()->json(['message' => '상품이 성공적으로 삭제되었습니다.']);
        }
}
