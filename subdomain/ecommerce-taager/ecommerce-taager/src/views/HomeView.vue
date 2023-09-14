<template>
  <div class="home">
    <!-- <img alt="Vue logo" src="../assets/logo.png" /> -->
    <!-- <HelloWorld msg="Welcome to Your Vue.js App" /> -->

    <NavBar></NavBar>
    <div class="flex flex-row gap-3">
      <SideBar></SideBar>
      <ProductsTable class="relative top-10"></ProductsTable>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from "@/components/HelloWorld.vue";
import NavBar from "@/components/NavBar.vue";
import SideBar from "@/components/SideBar.vue";
import ProductsTable from "@/components/Products/ProductsTable.vue";

export default {
  name: "HomeView",
  components: {
    NavBar,
    SideBar,
    ProductsTable,
  },
};
</script>
