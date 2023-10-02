<template>
  <div class="flex min-w-[400px] flex-wrap gap-5 p-4 sm:ml-64">
    <div
      v-for="item in listItems"
      :key="item.id"
      class="max-w-sm max-h-[500px] rounded overflow-hidden shadow-lg bg-slate-200 shadow-black relative right-12"
    >
      <img
        class="w-full"
        :src="
          item.images.length > 0
            ? this.baseUrl + '/' + item.images[0]['name']
            : ''
        "
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

  <div class="flex justify-center py-8">
    <div class="flex items-center py-8">
      <button
        @click="this.prevPage"
        class="h-10 w-16 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center"
      >
        Previous
      </button>
      <a
        v-for="page in totalPages"
        :key="page"
        href="#"
        class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center"
        >{{ page }}
      </a>
      <button
        @click="this.nextPage"
        class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center"
      >
        Next
      </button>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { watch } from "vue";
export default {
  name: "ContentCo",
  props: ["id"],
  data() {
    return {
      listItems: [],
      totalItems: 0,
      baseUrl: "http://foo.multivendor.test",
      currentPage: 1,
      itemsPerPage: 1,
      img: "",
    };
  },
  async mounted() {
    const config = {
      headers: {
        Origin: "http://localhost:8080",
      },
    };
    const res = await axios.get(
      "http://foo.multivendor.test/v1/product",
      config
    );
    this.listItems = res.data.data.data;
    this.currentPage = res.data.data.current_page;
    this.itemsPerPage = res.data.data.per_page;
    this.totalItems = res.data.data.total;

    watch(
      () => this.$store.state.search,
      () => {
        // This function will be called whenever myState changes
        if (this.$store.state.search) {
          this.listItems = this.$store.state.search;
        }
      }
    );
  },
  computed: {
    totalPages() {
      return Math.ceil(this.totalItems / this.itemsPerPage);
    },
  },
  updated() {
    if (this.$store.state.search) {
      this.listItems = this.$store.state.search;
      this.componentKey += 1;
    }
  },
  methods: {
    async paginate() {
      const config = {
        headers: {
          Origin: "http://localhost:8080",
        },
      };
      await axios
        .get(
          `http://foo.multivendor.test/v1/product?page=${this.currentPage}`,
          config
        )
        .then((res) => {
          this.listItems = res.data.data.data;
          this.currentPage = res.data.data.current_page;
          this.itemsPerPage = res.data.data.per_page;
        });
    },
    nextPage: function () {
      // console.log(this.totalPages);
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
        this.paginate();
      }
    },
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
        this.paginate();
      }
    },
  },
};
</script>
