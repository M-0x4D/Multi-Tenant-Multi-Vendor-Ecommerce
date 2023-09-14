<template>
  <div class="bg-red-500">
    <p>this is footer</p>
  </div>
</template>

<script>
// import router from "@/router/index";
// import store from "@/store/index";

// router.beforeEach((to, from, next) => {
//   if (to.matched.some((record) => record.meta.requiresAuth)) {
//     // this route requires auth, check if logged in
//     // if not, redirect to login page.
//     if (!store.getters.isLoggedIn) {
//       next({ name: "footerComponent" });
//     } else {
//       next("/"); // go to wherever I'm going
//     }
//   } else {
//     // next("/"); // does not require auth, make sure to always call next()!
//   }
// });
// import axios from "axios";

async function getUsers() {
  // return axios.get("http://bar.multivendor.test/users");
}

getUsers().then(() => console.log());

export default {
  name: "footerComponent",
  data: function () {
    return {};
  },
  mounted: {
    first: () => {
      console.log("first");
    },
    secend: () => {
      console.log("secend");
    },
  },
};
</script>
