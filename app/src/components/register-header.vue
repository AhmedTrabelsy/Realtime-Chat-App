<template>
  <div class="container mb-3" v-if="page == 'login'">
    <h1 class="display-5">Login</h1>
    <p>Welcome Back Please Login To Your Account</p>
  </div>
  <div class="container mb-3" v-else-if="page == 'signup'">
    <h1 class="display-5">Signup</h1>
    <p>New Here ? Create An Account For Free</p>
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
