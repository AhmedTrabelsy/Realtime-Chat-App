<template>
  <div class="signup">
    <signupPage />
  </div>
</template>

<script>
// @ is an alias to /src
import signupPage from "@/components/signup-page.vue";

export default {
  name: "HomeView",
  components: {
    signupPage,
  },
};
</script>
