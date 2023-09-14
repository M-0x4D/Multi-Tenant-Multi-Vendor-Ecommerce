<template>
  <div class="flex justify-center">
    <form @submit.prevent="submit" method="POST" class="w-full max-w-lg">
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="grid-first-name"
          >
            First Name
          </label>
          <input
            required
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-first-name"
            type="text"
            placeholder="Jane"
          />
          <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="grid-last-name"
          >
            Last Name
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-last-name"
            type="text"
            placeholder="Doe"
          />
        </div>
      </div>

      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 -mx-3">
        <label
          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
          for="grid-first-name"
        >
          Email
        </label>
        <input
          required
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          id="grid-first-name"
          type="email"
          placeholder="Jane"
        />
        <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
      </div>

      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 -mx-3">
        <label
          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
          for="grid-first-name"
        >
          Phone
        </label>
        <input
          required
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          id="grid-first-name"
          type="text"
          placeholder="Jane"
        />
        <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="grid-password"
          >
            Password
          </label>
          <input
            class="appearance-none block w-96 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-password"
            type="password"
            placeholder="******************"
          />
          <p class="text-gray-600 text-xs italic">
            Make it as long and as crazy as you'd like
          </p>
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 pl-0"
            for="grid-password"
          >
            Confirm Password
          </label>
          <input
            class="appearance-none block w-96 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="grid-password"
            type="password"
            placeholder="******************"
          />
          <p class="text-gray-600 text-xs italic">
            Make it as long and as crazy as you'd like
          </p>
        </div>
      </div>

      <div class="w-full md:w-1/2 px-3">
        <label
          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
          for="grid-last-name"
        >
          Commercial registry
        </label>
        <input
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="grid-last-name"
          type="text"
          placeholder="472649284"
        />
      </div>
      <div class="w-full md:w-1/2 m-4 px-3">
        <label
          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
          for=""
          >upload tax card</label
        >
        <input type="file" />
      </div>

      <div class="w-full md:w-1/2 m-4 px-3">
        <label
          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
          for=""
          >upload Identity card Face</label
        >
        <input type="file" />
      </div>

      <div class="w-full md:w-1/2 m-4 px-3">
        <label
          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
          for=""
          >upload Identity card Back</label
        >
        <input type="file" />
      </div>
      <button
        type="submit"
        class="bg-teal-500 w-full mt-8 mb-8 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
      >
        Register
      </button>
    </form>
  </div>
</template>
<script>
export default {
  name: "SignUpForm",
  data() {
    return {
      form: {
        email: "",
        description: "",
        city: "",
        subscribe: false,
        interval: "",
      },
    };
  },
  methods: {
    async submit() {
      //   this.$emit("submit", this.form);
      console.log(this.data());
    },
  },
};
</script>
