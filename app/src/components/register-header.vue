<template>
  <div class="container mb-3" v-if="page == 'login'">
    <h1 class="display-3">Login</h1>
    <p>Welcome back please login to your account</p>
  </div>
  <div class="container mb-3" v-else-if="page == 'signup'">
    <h1 class="display-3">Signup</h1>
    <p>Welcome back please create new account</p>
  </div>
  <hp v-else>Register Header Error</hp>
</template>

<script>
export default {
  name: "register-header",
  data() {
    return {};
  },
  props: {
    page: {
      type: String,
      required: true,
    },
  },
};
</script>
