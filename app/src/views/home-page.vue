<template>
  <div class="home-container container d-grid centred-container">
    <div class="row py-5">
      <div class="col-sm-5 my-auto">
        <lottieVue animation="home" />
      </div>
      <div class="register col-sm-7 glass-container px-5">
        <img :src="logoUrl" alt="home logo" class="logo mx-auto d-block my-3" />
        <h1 class="display-5">Join us now !</h1>
        <hr />
        <p class="display-6 fs-5">Connect with friends and the world around you on <strong>TuniChat</strong>.</p>
        <div class="px-5 pt-3 quote">
          <p class="fs-6">{{ quote }}</p>
          <p class="d-flex justify-content-end">
            <i>-- {{ author }} --</i>
          </p>
        </div>
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
import quoteService from "@/services/quoteService.js";

export default {
  name: "homePage",
  components: {
    lottieVue,
  },
  data() {
    return {
      quotes: {},
    };
  },
  computed: {
    logoUrl() {
      return require("@/assets/logo.png");
    },
    quote() {
      return this.quotes.text;
    },
    author() {
      return this.quotes.author;
    },
  },
  created() {
    quoteService
      .getQuote()
      .then((response) => {
        this.quotes = response.data[0];
      })
      .catch(function (error) {
        console.error(error);
      });
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
.quote {
  min-height: 30vh;
  max-height: 30vh;
  overflow: inherit;
}
</style>
