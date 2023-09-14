<template>
  <div class="home">
    <!-- <img alt="Vue logo" src="../assets/logo.png" /> -->
    <MultiVendorHome />
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from "@/components/HelloWorld.vue";
import MultiVendorHome from "@/components/MultiVendorHome.vue";

export default {
  name: "HomeView",
  components: {
    // HelloWorld,
    MultiVendorHome,
  },
};
</script>
