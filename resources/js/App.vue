<template>
  <div class="outerWrapper">
    <h1 class="header__title">10만원 이하만 파는 의류 쇼핑몰</h1>
    <ul class="productList">
      <li
        class="productList__item"
        v-for="product in products"
        :key="product.id"
      >
        <p>상품명 : {{ product.name }}</p>
        <p>설명 상세 : {{ product.description }}</p>
        <p>상품 가격 : {{ product.price }}</p>
        <button class="btn" @click="handleDeleteProduct(product.id)">
          삭제
        </button>
        <button class="btn" @click="handleUpdateProduct(product.id)">
          수정
        </button>
      </li>
    </ul>
  </div>
</template>
<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'

const products = ref([])

const fetchProducts = async () => {
  try {
    const response = await axios.get('/products')
    products.value = response.data
  } catch (error) {
    console.error(error)
  }
}

const handleUpdateProduct = async id => {
  try {
    alert('힝 속았지 수정 만드는 중')
  } catch {}
}

const handleDeleteProduct = async id => {
  try {
    if (confirm('상품을 삭제하시겠습니까?')) {
      await axios.delete(`/products/${id}`)
      products.value = products.value.filter(product => product.id !== id)
    }
  } catch (error) {
    console.error(error)
  }
}

onMounted(fetchProducts)
</script>

<style>
.header__title {
  text-align: center;
}
.productList {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  list-style-type: none;
}
.productList__item {
  border: 1px solid black;
  border-radius: 10px;
  margin: 10px;
  padding: 10px;
}
.btn {
  padding: 10px;
  margin: 10px;
  border-radius: 10px;
  font-weight: bold;
  cursor: pointer;
}
</style>
