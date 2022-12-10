<template>
  <div class="container mb-3" v-if="page == 'login'">
    <h1 class="display-5">Login</h1>
    <p>Welcome Back Please Login To Your Account</p>
  </div>
  <div class="container mb-3" v-else-if="page == 'signup'">
    <h1 class="display-5">Signup</h1>
    <p>New Here ? Create An Account For Free</p>
  </div>
  <h1 v-else>Register Header Error</h1>
</template>

<script>
export default {
  name: "registerHeader",
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
