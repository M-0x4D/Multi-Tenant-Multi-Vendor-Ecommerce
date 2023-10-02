<template>
  <div
    class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32"
  >
    <a href="#" class="text-2xl font-bold text-gray-800">sneekpeeks</a>
    <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
      <div class="relative">
        <ul
          class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4"
        >
          <li class="flex items-center space-x-3 text-left sm:space-x-4">
            <a
              class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700"
              href="#"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M5 13l4 4L19 7"
                /></svg
            ></a>
            <span class="font-semibold text-gray-900">Shop</span>
          </li>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4 text-gray-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M9 5l7 7-7 7"
            />
          </svg>
          <li class="flex items-center space-x-3 text-left sm:space-x-4">
            <a
              class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-600 text-xs font-semibold text-white ring ring-gray-600 ring-offset-2"
              href="#"
              >2</a
            >
            <span class="font-semibold text-gray-900">Shipping</span>
          </li>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4 text-gray-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M9 5l7 7-7 7"
            />
          </svg>
          <li class="flex items-center space-x-3 text-left sm:space-x-4">
            <a
              class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white"
              href="#"
              >3</a
            >
            <span class="font-semibold text-gray-500">Payment</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
    <div class="px-4 pt-8">
      <p class="text-xl font-medium">Order Summary</p>
      <p class="text-gray-400">
        Check your items. And select a suitable shipping method.
      </p>
      <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
        <div
          v-for="product in this.products"
          :key="product"
          class="flex flex-col rounded-lg bg-white sm:flex-row"
        >
          <img
            class="m-2 h-24 w-28 rounded-md border object-cover object-center"
            :src="product.image"
            alt=""
          />
          <div class="flex w-full flex-col px-4 py-4">
            <span class="font-semibold">{{ product.name }}</span>
            <span class="float-right text-gray-400">42EU - 8.5US</span>
            <p class="text-lg font-bold">$ {{ product.price }}</p>
          </div>
          <div class="flex items-center border-gray-100">
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
        </div>
        <!-- <div class="flex flex-col rounded-lg bg-white sm:flex-row">
          <img
            class="m-2 h-24 w-28 rounded-md border object-cover object-center"
            src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
            alt=""
          />
          <div class="flex w-full flex-col px-4 py-4">
            <span class="font-semibold"
              >Nike Air Max Pro 8888 - Super Light</span
            >
            <span class="float-right text-gray-400">42EU - 8.5US</span>
            <p class="mt-auto text-lg font-bold">$238.99</p>
          </div>
        </div> -->
      </div>

      <p class="mt-8 text-lg font-medium">Shipping Addresses</p>

      <div class="shadow-black border">
        <a @click="showAddressForm" class="text-blue-500" href="#"
          >don't have an address ? so add address from here</a
        >
        <form id="addressForm" class="hidden" @submit.prevent="this.addAddress">
          <!-- Name -->
          <div class="w-64">
            <label for="example-select" class="block text-gray-700 font-bold"
              >Select an Option:</label
            >
            <select
              id="example-select"
              v-model="governrate_id"
              class="w-full px-4 py-2 mt-2 border rounded-lg focus:ring focus:border-blue-300"
            >
              <option
                v-for="governrate in this.governrates"
                :key="governrate.id"
                :value="governrate.id"
                class="m-2 py-2"
              >
                {{ governrate.name }}
              </option>
            </select>
          </div>

          <div class="m-8 ml-0 flex gap-4 items-center">
            <label for="phoneNumber">Phone Number</label>
            <input
              v-model="this.phone_number"
              class="border border-black"
              type="text"
              id="phoneNumber"
              required
            />
          </div>
          <!-- City -->
          <div class="m-8 ml-0 flex gap-4 items-center">
            <label for="city">City</label>
            <input
              v-model="this.city"
              class="border border-black"
              type="text"
              id="city"
              required
            />
          </div>

          <div class="flex justify-center m-2">
            <button
              type="submit"
              class="bg-gray-900 text-white px-4 py-2 rounded"
            >
              Add Address
            </button>
          </div>
        </form>
      </div>

      <form class="mt-5 grid gap-6 mb-5">
        <div
          v-for="address in this.addresses"
          :key="address.id"
          class="relative"
        >
          <input
            class="peer hidden"
            :id="address.city"
            :value="address.id"
            v-model="order.addressId"
            type="radio"
            name="radio"
            checked
          />
          <span
            class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"
          ></span>
          <label
            class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
            :for="address.city"
          >
            <!-- <img
              class="w-14 object-contain"
              src="/images/naorrAeygcJzX0SyNI4Y0.png"
              alt=""
            /> -->
            <div class="ml-5">
              <span class="mt-2 font-semibold">
                {{ address.governrate.name }}
              </span>
              <p class="text-slate-500 text-sm leading-6">{{ address.city }}</p>
            </div>
          </label>
        </div>
      </form>
    </div>
    <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
      <form @submit.prevent="this.placeOrder">
        <p class="text-xl font-medium">Payment Details</p>
        <p class="text-gray-400">
          Complete your order by providing your payment details.
        </p>
        <div class="">
          <div
            v-for="payment in this.paymentMethods"
            :key="payment.id"
            class="relative m-2"
          >
            <input
              v-model="order.paymentMethodId"
              class="peer hidden"
              :id="payment.name"
              :value="payment.id"
              type="radio"
              name="radio"
              checked
            />
            <span
              class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"
            ></span>
            <label
              class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
              :for="payment.name"
            >
              <!-- <img
              class="w-14 object-contain"
              src="/images/naorrAeygcJzX0SyNI4Y0.png"
              alt=""
            /> -->
              <div class="ml-5">
                <span class="mt-2 font-semibold">
                  {{ payment.name }}
                </span>
                <p class="text-slate-500 text-sm leading-6">
                  Delivery: 2-4 Days
                </p>
              </div>
            </label>
          </div>
          <!-- Total -->
          <div class="mt-6 border-t border-b py-2">
            <div class="flex items-center justify-between">
              <p class="text-sm font-medium text-gray-900">Subtotal</p>
              <p class="font-semibold text-gray-900">$ {{ this.subTotal }}</p>
            </div>
            <div class="flex items-center justify-between">
              <p class="text-sm font-medium text-gray-900">Shipping</p>
              <p class="font-semibold text-gray-900">
                $ {{ this.shippingPrice }}
              </p>
            </div>
          </div>
          <div class="mt-6 flex items-center justify-between">
            <p class="text-sm font-medium text-gray-900">Total</p>
            <p class="text-2xl font-semibold text-gray-900">
              $ {{ this.totalPrice }}
            </p>
          </div>
        </div>
        <button
          id="order"
          class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white"
        >
          Place Order
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "CheckOut",
  data() {
    return {
      productIds: [],
      governrate_id: 0,
      shippingPrice: 0,
      phone_number: 0,
      products: [],
      addresses: [],
      subTotal: 0,
      city: "",
      totalPrice: 0,
      paymentMethods: [],
      governrates: [],
      shippingAddress: "",
      order: {
        addressId: 0,
        paymentMethodId: 2,
        gateway: "",
      },
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
        res.data.data.forEach((element) => {
          this.products.push(element);
          this.productIds.push(element.id);
        });
        // this.products.push(...res.data.data[0].products);
        console.log(res.data);
      })
      .then(() => {
        // for (let product in this.products) {
        //   console.log(product.price);
        // }
      });
    await axios
      .get("http://foo.multivendor.test/v1/governrate", config)
      .then((res) => {
        this.governrates = res.data.data;
        // console.log(this.governrates);
      });
    await axios
      .get("http://foo.multivendor.test/v1/address", config)
      .then((res) => {
        this.addresses = res.data.data;
        this.order.addressId = this.addresses[0].id;

        // console.log(this.addresses);
      });

    await axios
      .get("http://foo.multivendor.test/v1/payment-method", config)
      .then((res) => {
        this.paymentMethods = res.data.data;
        // console.log(this.paymentMethods);
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
        this.shippingPrice = res.data;
        // console.log(this.paymentMethods);
      });

    await axios
      .post("http://foo.multivendor.test/v1/total-price", {}, config)
      .then((res) => {
        this.totalPrice = res.data;
        // console.log(this.paymentMethods);
      });
  },
  methods: {
    showAddressForm: function () {
      document.getElementById("addressForm").style.display = "block";
    },
    addAddress: async function () {
      const config = {
        headers: {
          Authorization:
            "Bearer wppO9MjAnIlKDY8LTTGDLZk1oszOrKAuoPhDKlpF1823212b",
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      };
      await axios
        .post(
          "http://foo.multivendor.test/v1/address",
          {
            phone_number: this.phone_number,
            governrate_id: this.governrate_id,
            city: this.city,
          },
          config
        )
        .then((res) => {
          // this.subTotal = res.data;
          console.log(res.data);
          if (res.data.status == 200) {
            this.$router.go();
          }
        });
    },
    placeOrder: async function () {
      // console.log(this.order);
      if (this.subTotal == 0) return;
      this.order.paymentMethodId == 1
        ? (this.order.gateway = "paypal")
        : (this.order.gateway = "cash-on-deliver");
      console.log(this.order.paymentMethodId);
      const config = {
        headers: {
          Authorization:
            "Bearer wppO9MjAnIlKDY8LTTGDLZk1oszOrKAuoPhDKlpF1823212b",
          Accept: "application/json",
          "Content-Type": "application/json",
        },
      };
      await axios
        .post(
          "http://foo.multivendor.test/v1/handle-payment",
          {
            gateway: this.order.gateway,
            payment_method_id: this.order.paymentMethodId,
            address_id: this.order.addressId,
            shippment_method_id: 1,
            productIds: this.productIds,
          },

          config
        )
        .then((res) => {
          // Redirect the user to the PayPal link
          if (res.data !== "cash") {
            // window.location.href = res.data;
          } else {
            if (res.data.status == 200) {
              // this.$router.push({ path: "/" });
            }
          }

          console.log(res);
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
