<template>
  <!-- component -->
  <section
    class="shadow-black text-gray-700 body-font overflow-hidden bg-slate-200"
  >
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img
          alt="ecommerce"
          class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200"
          :src="this.img"
        />
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h1
            :title="details.name"
            class="text-gray-900 text-3xl title-font font-medium mb-1"
          >
            {{ details.name }}
          </h1>
          <h2 class="text-sm title-font text-gray-500 tracking-widest">
            {{ details.description }}
          </h2>
          <div class="flex mb-4">
            <!-- <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 gap-4">
              <ShareNetwork
                network="facebook"
                url="https://news.vuejs.org/issues/180"
                title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                quote="The hot reload is so fast it\'s near instant. - Evan You"
                hashtags="vuejs,vite"
              >
                <svg
                  fill="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-5 h-5"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"
                  ></path>
                </svg>
              </ShareNetwork>

              <ShareNetwork
                network="twitter"
                url="https://news.vuejs.org/issues/180"
                title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                quote="The hot reload is so fast it\'s near instant. - Evan You"
                hashtags="vuejs,vite"
              >
                <svg
                  fill="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-5 h-5"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
                  ></path>
                </svg>
              </ShareNetwork>

              <ShareNetwork
                network="linkedin"
                url="https://news.vuejs.org/issues/180"
                title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                quote="The hot reload is so fast it\'s near instant. - Evan You"
                hashtags="vuejs,vite"
              >
                <svg
                  fill="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-5 h-5"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M 5 3 C 3.9 3 3 3.9 3 5 L 3 19 C 3 20.1 3.9 21 5 21 L 19 21 C 20.1 21 21 20.1 21 19 L 21 5 C 21 3.9 20.1 3 19 3 L 5 3 z M 5 5 L 19 5 L 19 19 L 5 19 L 5 5 z M 7.8007812 6.3007812 C 6.9007812 6.3007812 6.4003906 6.8 6.4003906 7.5 C 6.4003906 8.2 6.8992188 8.6992188 7.6992188 8.6992188 C 8.5992187 8.6992187 9.0996094 8.2 9.0996094 7.5 C 9.0996094 6.8 8.6007813 6.3007812 7.8007812 6.3007812 z M 6.5 10 L 6.5 17 L 9 17 L 9 10 L 6.5 10 z M 11.099609 10 L 11.099609 17 L 13.599609 17 L 13.599609 13.199219 C 13.599609 12.099219 14.499219 11.900391 14.699219 11.900391 C 14.899219 11.900391 15.599609 12.099219 15.599609 13.199219 L 15.599609 17 L 18 17 L 18 13.199219 C 18 10.999219 17.000781 10 15.800781 10 C 14.600781 10 13.899609 10.4 13.599609 11 L 13.599609 10 L 11.099609 10 z"
                  ></path>
                </svg>
              </ShareNetwork>

              <ShareNetwork
                network="whatsapp"
                url="https://news.vuejs.org/issues/180"
                title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                quote="The hot reload is so fast it\'s near instant. - Evan You"
                hashtags="vuejs,vite"
              >
                <svg
                  fill="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-5 h-5"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M 12.011719 2 C 6.5057187 2 2.0234844 6.478375 2.0214844 11.984375 C 2.0204844 13.744375 2.4814687 15.462563 3.3554688 16.976562 L 2 22 L 7.2324219 20.763672 C 8.6914219 21.559672 10.333859 21.977516 12.005859 21.978516 L 12.009766 21.978516 C 17.514766 21.978516 21.995047 17.499141 21.998047 11.994141 C 22.000047 9.3251406 20.962172 6.8157344 19.076172 4.9277344 C 17.190172 3.0407344 14.683719 2.001 12.011719 2 z M 12.009766 4 C 14.145766 4.001 16.153109 4.8337969 17.662109 6.3417969 C 19.171109 7.8517969 20.000047 9.8581875 19.998047 11.992188 C 19.996047 16.396187 16.413812 19.978516 12.007812 19.978516 C 10.674812 19.977516 9.3544062 19.642812 8.1914062 19.007812 L 7.5175781 18.640625 L 6.7734375 18.816406 L 4.8046875 19.28125 L 5.2851562 17.496094 L 5.5019531 16.695312 L 5.0878906 15.976562 C 4.3898906 14.768562 4.0204844 13.387375 4.0214844 11.984375 C 4.0234844 7.582375 7.6067656 4 12.009766 4 z M 8.4765625 7.375 C 8.3095625 7.375 8.0395469 7.4375 7.8105469 7.6875 C 7.5815469 7.9365 6.9355469 8.5395781 6.9355469 9.7675781 C 6.9355469 10.995578 7.8300781 12.182609 7.9550781 12.349609 C 8.0790781 12.515609 9.68175 15.115234 12.21875 16.115234 C 14.32675 16.946234 14.754891 16.782234 15.212891 16.740234 C 15.670891 16.699234 16.690438 16.137687 16.898438 15.554688 C 17.106437 14.971687 17.106922 14.470187 17.044922 14.367188 C 16.982922 14.263188 16.816406 14.201172 16.566406 14.076172 C 16.317406 13.951172 15.090328 13.348625 14.861328 13.265625 C 14.632328 13.182625 14.464828 13.140625 14.298828 13.390625 C 14.132828 13.640625 13.655766 14.201187 13.509766 14.367188 C 13.363766 14.534188 13.21875 14.556641 12.96875 14.431641 C 12.71875 14.305641 11.914938 14.041406 10.960938 13.191406 C 10.218937 12.530406 9.7182656 11.714844 9.5722656 11.464844 C 9.4272656 11.215844 9.5585938 11.079078 9.6835938 10.955078 C 9.7955938 10.843078 9.9316406 10.663578 10.056641 10.517578 C 10.180641 10.371578 10.223641 10.267562 10.306641 10.101562 C 10.389641 9.9355625 10.347156 9.7890625 10.285156 9.6640625 C 10.223156 9.5390625 9.737625 8.3065 9.515625 7.8125 C 9.328625 7.3975 9.131125 7.3878594 8.953125 7.3808594 C 8.808125 7.3748594 8.6425625 7.375 8.4765625 7.375 z"
                  ></path>
                </svg>
              </ShareNetwork>
            </span> -->
          </div>
          <p :body="details.body" class="leading-relaxed">
            {{ details.body }}
          </p>
          <div
            class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5"
          >
            <!-- <div class="flex">
              <span class="mr-3">Color</span>
              <button
                class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"
              ></button>
              <button
                class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"
              ></button>
              <button
                class="border-2 border-gray-300 ml-1 bg-red-500 rounded-full w-6 h-6 focus:outline-none"
              ></button>
            </div> -->
            <div class="flex ml-6 items-center">
              <span class="mr-3">Size</span>
              <div class="relative">
                <select
                  class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10"
                >
                  <!-- <option value="" selected disabled>Choose size</option> -->
                  <option
                    v-for="(size, index) in this.sizes"
                    :key="index"
                    :selected="size.id"
                  >
                    {{ size.size }}
                  </option>
                  <!-- <option></option> -->
                  choose
                </select>

                <span
                  class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center"
                >
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-4 h-4"
                    viewBox="0 0 24 24"
                  >
                    <path d="M6 9l6 6 6-6"></path>
                  </svg>
                </span>
              </div>
            </div>
          </div>
          <div class="flex gap-6">
            <span class="title-font font-medium text-2xl text-gray-900"
              >$ {{ details.offerPrice ?? details.price }}
              <s id="myDIV" class="hidden"> {{ details.price }} </s>
            </span>

            <!-- <router-link :to="{ name: 'checkout' }">
              <button
                :id="details.id"
                @click="this.goToCheckOut()"
                class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded bg-tahiti-test"
              >
                Check Out
              </button>
            </router-link> -->

            <button
              @click="this.addToCart()"
              id="addToCart"
              class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded bg-tahiti-test"
            >
              Add To Cart
            </button>

            <div
              id="counter"
              class="hidden items-center justify-center gap-5 h-10"
            >
              <div class="flex items-center border-gray-100">
                <span
                  @click="this.decreaseValue"
                  class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"
                >
                  -
                </span>
                <input
                  class="h-8 w-8 border bg-white text-center text-xs outline-none"
                  type="number"
                  :value="this.qty"
                  min="1"
                />
                <span
                  @click="this.increaseValue"
                  class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"
                >
                  +
                </span>
              </div>
              <button
                @click="goToCart"
                class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded bg-tahiti-test"
              >
                Go To Cart
              </button>
              <!-- <div
                class="flex justify-center items-center bg-red-500 w-10 h-10"
                id="decrease"
                @click="this.decreaseValue"
                value="this.qty"
              >
                -
              </div>
              <input
                class="flex w-10 align-middle justify-center h-10"
                type="number"
                id="number"
                :value="this.qty"
              />
              <div
                class="flex justify-center items-center bg-red-500 w-10 h-10"
                id="increase"
                @click="this.increaseValue"
                value="this.qty"
              >
                +
              </div> -->
            </div>

            <button
              id="love"
              @click="this.addToFavourites(this.details.id)"
              class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4"
            >
              <svg
                fill="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                class="w-5 h-5"
                viewBox="0 0 24 24"
              >
                <path
                  d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"
                ></path>
              </svg>
            </button>
          </div>

          <span class="flex items-center mt-10">
            <svg
              fill="currentColor"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-4 h-4 text-red-500"
              viewBox="0 0 24 24"
            >
              <path
                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
              ></path>
            </svg>
            <svg
              fill="currentColor"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-4 h-4 text-red-500"
              viewBox="0 0 24 24"
            >
              <path
                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
              ></path>
            </svg>
            <svg
              fill="currentColor"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-4 h-4 text-red-500"
              viewBox="0 0 24 24"
            >
              <path
                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
              ></path>
            </svg>
            <svg
              fill="currentColor"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-4 h-4 text-red-500 hover:text-red-600"
              viewBox="0 0 24 24"
            >
              <path
                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
              ></path>
            </svg>
            <svg
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-4 h-4 text-red-500"
              viewBox="0 0 24 24"
            >
              <path
                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
              ></path>
            </svg>
            <span class="text-gray-600 ml-3">
              {{ this.reviewsCount }} Reviews</span
            >
          </span>
        </div>
      </div>
    </div>
  </section>
  <section class="block mt-10 mb-10 p-8">
    <ReviewsComponent :reviews="this.details.reviews" />
  </section>
</template>

<script>
import axios from "axios";
import ReviewsComponent from "@/components/Reviews.vue";

export default {
  name: "ProductDetails",
  data() {
    return {
      details: {},
      productId: 0,
      reviewsCount: 0,
      img: "",
      sizes: [],
      qty: 1,
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
      .get(
        "http://foo.multivendor.test/v1/product/" + this.$route.params.id,
        config
      )
      .then((res) => {
        this.details = res.data.data;
        this.$store.state.reviews = this.details.reviews;
        this.$store.state.productId = this.details.id;
      });

    if (this.details.inCart == true) {
      document.getElementById("addToCart").style.display = "none";
      document.getElementById("counter").style.display = "flex";
    }
    if (this.details.offerPrice !== null) {
      document.getElementById("myDIV").style.display = "inline";
    }
    if (this.details.isFavourite) {
      document.getElementById("love").style.color = " #FF0000";
    }
    const reviewsCount = this.details.reviews.length;
    this.reviewsCount = reviewsCount;
    if (this.details.images.length > 0) {
      this.img = "http://foo.multivendor.test/" + this.details.images[0].name;
    }
    this.sizes = this.details.sizes;
    this.qty = this.details.cartQty;
    console.log(reviewsCount);
  },
  methods: {
    updateQty: async function () {
      await axios
        .put(
          "http://foo.multivendor.test/v1/cart/" + 1,
          {
            productId: this.details.id,
            qty: this.qty,
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
        });
    },
    addToCart: async function () {
      // this.productIds.push(this.details.id);
      this.productId = this.details.id;
      await axios
        .post(
          "http://foo.multivendor.test/v1/cart",
          {
            productId: this.productId,
            qty: this.qty,
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
          if (res.data.status == 200) {
            document.getElementById("addToCart").style.display = "none";
            this.qty = 1;
            document.getElementById("counter").style.display = "flex";
          }
          console.log(res);
        });
    },
    addToFavourites: async (id) => {
      console.log("test");
      await axios
        .post(
          "http://foo.multivendor.test/v1/favourite",
          {
            product_id: id,
          },

          {
            headers: {
              Authorization:
                "Bearer wppO9MjAnIlKDY8LTTGDLZk1oszOrKAuoPhDKlpF1823212b",
              Accept: "application/json",
              "Content-Type": "application/json",
              origin: "http://192.168.1.12:8080",
            },
          }
        )
        .then(function (res) {
          console.log(res);
          if (res.data.status === 200) {
            console.log("haha");
            document.getElementById("love").style.color = " #FF0000";
          } else {
            document.getElementById("love").style.color = "#708090";
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    },
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
    goToCart: function () {
      this.$router.push("/cart");
    },
    goToCheckOut: () => {},
    increaseValue: function () {
      if (this.details.qty >= this.qty + 1) {
        this.qty += 1;
        this.updateQty();
        // console.log(this.qty);
      }
    },
    decreaseValue: function () {
      if (this.qty - 2 >= 0) {
        this.qty--;
        this.updateQty();
        // console.log(this.qty);
      }
    },
  },
  components: {
    ReviewsComponent,
  },
};
</script>

<style></style>
