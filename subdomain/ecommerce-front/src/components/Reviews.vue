<template>
  <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4">Write a Review</h2>
    <form v-on:submit.prevent="addReview">
      <!-- Name Input -->
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium"
          >Your Name</label
        >
        <input
          type="text"
          id="name"
          v-model="name"
          name="name"
          class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
          required
        />
      </div>

      <!-- Rating Input -->
      <div class="mb-4">
        <label class="block text-gray-700 font-medium">Rating</label>
        <div class="flex items-center">
          <!-- You can use a set of radio buttons or a select dropdown for rating -->
          <select
            v-model="rate"
            id="rating"
            name="rating"
            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="5">5 Stars</option>
            <option value="4">4 Stars</option>
            <option value="3">3 Stars</option>
            <option value="2">2 Stars</option>
            <option value="1">1 Star</option>
          </select>
        </div>
      </div>

      <!-- Review Text Input -->
      <div class="mb-4">
        <label for="review" class="block text-gray-700 font-medium"
          >Review</label
        >
        <textarea
          id="review"
          name="review"
          v-model="comment"
          rows="4"
          class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
          required
        ></textarea>
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button
          type="submit"
          class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out"
        >
          Submit
        </button>
      </div>
    </form>
  </div>

  <div
    v-for="review in reviews"
    :key="review"
    class="bg-white rounded-lg shadow-lg p-6 shadow-slate-200 m-3"
  >
    <!-- Review Header -->
    <div class="flex items-center">
      <img
        src="user-avatar.jpg"
        alt="User Avatar"
        class="w-12 h-12 rounded-full mr-4"
      />
      <div>
        <h3 class="text-lg font-semibold">{{ review.name }}</h3>
        <p class="text-gray-600">Posted on {{ review.created_at }}</p>
      </div>
    </div>

    <!-- Review Content -->
    <p class="mt-4">
      {{ review.comment }}
    </p>

    <!-- Review Rating -->
    <div class="mt-4 flex items-center">
      <div class="flex">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5 text-yellow-500"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            d="M10 1l2.4 5.6h5.6l-4.4 3.6 1.6 6.4-5.6-4.4-5.6 4.4 1.6-6.4-4.4-3.6h5.6z"
          />
        </svg>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5 text-yellow-500"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            d="M10 1l2.4 5.6h5.6l-4.4 3.6 1.6 6.4-5.6-4.4-5.6 4.4 1.6-6.4-4.4-3.6h5.6z"
          />
        </svg>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5 text-yellow-500"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            d="M10 1l2.4 5.6h5.6l-4.4 3.6 1.6 6.4-5.6-4.4-5.6 4.4 1.6-6.4-4.4-3.6h5.6z"
          />
        </svg>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5 text-yellow-500"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            d="M10 1l2.4 5.6h5.6l-4.4 3.6 1.6 6.4-5.6-4.4-5.6 4.4 1.6-6.4-4.4-3.6h5.6z"
          />
        </svg>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5 text-gray-300"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            d="M10 1l2.4 5.6h5.6l-4.4 3.6 1.6 6.4-5.6-4.4-5.6 4.4 1.6-6.4-4.4-3.6h5.6z"
          />
        </svg>
      </div>
      <p class="text-gray-600 ml-2">{{ review.rate }}</p>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "ReviewsComponent",
  data: function () {
    return {
      name: "",
      rate: 1,
      comment: "",
    };
  },
  props: { reviews: Array },
  mounted() {},
  methods: {
    addReview: async function () {
      const formData = {
        name: this.name,
        comment: this.comment,
        rate: this.rate,
        type: "product",
        reviewable_id: this.$store.state.productId,
      };
      await axios
        .post("http://foo.multivendor.test/v1/review", formData, {
          headers: {
            Authorization:
              "Bearer wppO9MjAnIlKDY8LTTGDLZk1oszOrKAuoPhDKlpF1823212b",
          },
        })
        .then(() => {
          // console.log("kdu");
          // this.reviews = [...this.reviews, res.data];
          this.$router.go();
        });
    },
  },
};
</script>
