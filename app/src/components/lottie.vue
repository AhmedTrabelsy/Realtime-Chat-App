<template>
  <Vue3Lottie v-if="animation == 'login'" :animationData="login" />
  <Vue3Lottie v-else-if="animation == 'signup'" :animationData="signup" />
  <Vue3Lottie v-else-if="animation == 'home'" :animationData="home" />
  <h1 v-else>Lottie not found</h1>
</template>

<script>
import home from "@/assets/animations/home.json";
import login from "@/assets/animations/login.json";
import signup from "@/assets/animations/signup.json";
export default {
  name: "lottieVue",
  data() {
    return {
      login,
      signup,
      home,
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
