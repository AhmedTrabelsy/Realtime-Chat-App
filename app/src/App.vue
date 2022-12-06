<template>
  <div id="app">
    <login-page />
  </div>
</template>

<script>
import loginPage from "@/components/login-page.vue";

export default {
  name: "app",
  components: {
    loginPage,
  },
};
document.title = "TuniChat";
</script>
