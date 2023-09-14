<template>
  <div class="flex min-w-[400px] flex-wrap gap-5 p-4 sm:ml-64">
    <div
      v-for="item in listItems"
      :key="item.id"
      class="max-w-sm max-h-[500px] rounded overflow-hidden shadow-lg bg-slate-200 shadow-black relative right-12"
    >
      <img
        class="w-full"
        :src="this.baseUrl + '/' + item.images[0]['name']"
        alt="Sunset in the product"
      />
      <div class="px-6 py-4">
        <!-- <div class="font-bold text-xl mb-2">{{ item.title }}</div> -->
        <router-link
          :to="{ name: 'ProductDetails', params: { id: item.id } }"
          >{{ item.name }}</router-link
        >
        <p class="text-gray-700 text-base">
          {{ item.description }}
        </p>
      </div>
      <div class="px-6 pt-4 pb-2">
        <span
          class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
          >#product</span
        >
        <span
          class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
          >Quantity : {{ item.qty }}
        </span>
        <span
          class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
          >price : {{ item.price }}</span
        >
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { makeTest } from "@/components/test.js";
export default {
  name: "ContentCo",
  props: ["id"],
  data() {
    return {
      listItems: [],
      baseUrl: "http://foo.multivendor.test",
    };
  },
  async mounted() {
    const res = await axios.get("http://foo.multivendor.test/v1/product");
    this.listItems = res.data.data.data;
    console.log(this.listItems[0]["images"][0]["name"]);
    this.$store.state.lo = "suuuu";
    makeTest();
    console.log(this.token);
  },
  computed: {
    token() {
      return this.$store.state.token;
    },
    lo() {
      return this.$store.state.lo;
    },
  },
};
</script>
