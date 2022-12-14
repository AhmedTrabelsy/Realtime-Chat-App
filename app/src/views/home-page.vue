<template>
  <div class="home-container container d-grid centred-container">
    <div class="row py-5">
      <div class="col-sm-5 my-auto"><lottieVue animation="home" /></div>
      <div class="register col-sm-7 glass-container px-5">
        <img :src="logoUrl" alt="home logo" class="logo mx-auto d-block my-3" />
        <h1 class="display-5">Join us now !</h1>
        <hr />
        <p class="display-6 fs-5">Connect with friends and the world around you on <strong>TuniChat</strong>.</p>
        <div class="buttons btn-group d-flex justify-content-center bluryButton">
          <router-link :to="{ name: 'login' }" class="btn btn-outline-light">Login</router-link>
          <router-link :to="{ name: 'signup' }" class="btn btn-outline-light">SignUp</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import lottieVue from "@/components/lottie.vue";

export default {
  name: "homePage",
  components: {
    lottieVue,
  },
  computed: {
    logoUrl() {
      return require("@/assets/logo.png");
    },
  },
};
</script>

<style>
.home-container {
  width: 100vw;
  height: 100vh;
  overflow-x: hidden;
  overflow-y: auto;
}
.logo {
  width: 25rem;
}
.register strong {
  color: #6d0073;
}
.buttons {
  margin-top: 23vh;
}
</style>
