<template>
  <Vue3Lottie v-if="animation == 'login'" :animationData="login" />
  <Vue3Lottie v-else-if="animation == 'signup'" :animationData="signup" />
  <hp v-else>Lottie not found</hp>
</template>

<script>
import login from "@/assets/animations/login.json";
import signup from "@/assets/animations/signup.json";
import Vue3Lottie from "vue3-lottie";

export default {
  name: "lottie-vue",
  data() {
    return {
      Vue3Lottie,
      login,
      signup,
    };
  },
  props: {
    animation: {
      type: String,
      required: true,
    },
  },
};
</script>
