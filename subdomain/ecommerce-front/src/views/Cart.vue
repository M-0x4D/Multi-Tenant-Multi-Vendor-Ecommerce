<template>
  <div class="h-screen bg-gray-100 pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
    <div
      class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0"
    >
      <div class="rounded-lg md:w-2/3">
        <div
          v-for="product in this.products"
          :key="product"
          class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start"
        >
          <img
            :src="product.image"
            alt="product-image"
            class="w-full rounded-lg sm:w-40"
          />
          <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
            <div class="mt-5 sm:mt-0">
              <h2 class="text-lg font-bold text-gray-900">
                {{ product.name }}
              </h2>
              <div class="flex items-center space-x-4">
                <p class="text-sm">{{ product.price }} $</p>
              </div>
            </div>
            <div
              class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6"
            >
              <div class="flex items-center relative left-6 border-gray-100">
                <span
                  @click="this.decreaseQty(product.id, product.cartQty)"
                  class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"
                >
                  -
                </span>
                <input
                  class="h-8 w-8 border bg-white text-center text-xs outline-none"
                  type="number"
                  :value="product.cartQty"
                  min="1"
                />
                <span
                  @click="
                    this.increaseQty(
                      product.id,
                      product.cartQty <= product.qty
                        ? product.cartQty
                        : product.qty - 1
                    )
                  "
                  class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"
                >
                  +
                </span>
              </div>

              <button
                @click="removeFromCart(product.id)"
                class="flex items-center bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
              >
                <i class="fas fa-trash mr-2"></i> Remove
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Sub total -->
      <div
        class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3"
      >
        <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Subtotal</p>
          <p class="text-gray-700">${{ this.subTotal }}</p>
        </div>
        <div class="flex justify-between">
          <p class="text-gray-700">Shipping</p>
          <p class="text-gray-700">${{ this.shipping }}</p>
        </div>
        <hr class="my-4" />
        <div class="flex justify-between">
          <p class="text-lg font-bold">Total</p>
          <div class="">
            <p class="mb-1 text-lg font-bold">${{ this.total }} USD</p>
            <p class="text-sm text-gray-700">including VAT</p>
          </div>
        </div>
        <button
          @click="this.$router.push('checkout')"
          class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600"
        >
          Check out
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "ShoppingCart",
  data() {
    return {
      products: [],
      productIds: [],
      subTotal: 0,
      total: 0,
      shipping: 0,
      qty: 0,
    };
  },
  async mounted() {
    const config = {
      headers: {
        Authorization:
          "Bearer wppO9MjAnIlKDY8LTTGDLZk1oszOrKAuoPhDKlpF1823212b",
        Accept: "application/json",
        "Content-Type": "application/json",
      },
    };
    await axios
      .get("http://foo.multivendor.test/v1/cart", config)
      .then((res) => {
        // if (res.data.data > 0) {
        res.data.data.forEach((element) => {
          this.products.push(element);
          this.productIds.push(element.id);
        });
        // }
        // this.products.push(...res.data.data[0].products);
        console.log(res.data);
      });

    await axios
      .post("http://foo.multivendor.test/v1/sub-total", {}, config)
      .then((res) => {
        this.subTotal = res.data;
        // console.log(res);
      });
    await axios
      .post("http://foo.multivendor.test/v1/shipping-price", {}, config)
      .then((res) => {
        this.shipping = res.data;
        // console.log(this.paymentMethods);
      });

    await axios
      .post("http://foo.multivendor.test/v1/total-price", {}, config)
      .then((res) => {
        this.total = res.data;
        // console.log(this.paymentMethods);
      });
  },
  methods: {
    removeFromCart: async function (id) {
      await axios
        .delete("http://foo.multivendor.test/v1/cart/" + id, {
          headers: {
            Authorization:
              "Bearer wppO9MjAnIlKDY8LTTGDLZk1oszOrKAuoPhDKlpF1823212b",
            // origin: "http://localhost:8080",
          },
        })
        .then(() => {
          this.$router.go();
        });
    },
    increaseQty: async function (id, qty) {
      await axios
        .put(
          "http://foo.multivendor.test/v1/cart/" + 1,
          {
            productId: id,
            qty: qty + 1,
          },
          {
            headers: {
              Authorization:
                "Bearer wppO9MjAnIlKDY8LTTGDLZk1oszOrKAuoPhDKlpF1823212b",
              // origin: "http://localhost:8080",
            },
          }
        )
        .then((res) => {
          console.log(res);
          this.$router.go();
        });
    },
    decreaseQty: async function (id, qty) {
      await axios
        .put(
          "http://foo.multivendor.test/v1/cart/" + 1,
          {
            productId: id,
            qty: qty > 1 ? qty - 1 : 1,
          },
          {
            headers: {
              Authorization:
                "Bearer wppO9MjAnIlKDY8LTTGDLZk1oszOrKAuoPhDKlpF1823212b",
              // origin: "http://localhost:8080",
            },
          }
        )
        .then((res) => {
          console.log(res);
          this.$router.go();
        });
    },
  },
};
</script>
