<template>
  <div class="glass-container centred-container">
    <div class="login-logo container">
      <lottieVue animation="login" />
    </div>
    <div class="register-form-container">
      <registerHeader page="login" />
      <form @submit.prevent="handleSubmit" class="container d-flex flex-column">
        <div class="form-group mb-3">
          <label for="email">Email address</label>
          <input type="email" class="form-control bg-transparent mt-2" id="email" v-model="email" required />
        </div>
        <div class="form-group mb-1">
          <label for="password">Password</label>
          <input type="password" class="form-control bg-transparent mt-2" id="password" v-model="password" required />
          <p v-if="passwordError" class="text-warning password">
            {{ passwordError }}
          </p>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="remember" v-model="rememberMe" />
          <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-outline-danger submit-register">Login</button>
      </form>
      <div class="container text-center mt-4">
        <p>
          Don't Have an account ?
          <router-link :to="{ name: 'signup' }">Signup</router-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import lottieVue from "@/components/lottie.vue";
import registerHeader from "@/components/register-header.vue";

export default {
  name: "loginPage",
  components: {
    lottieVue,
    registerHeader,
  },
  data() {
    return {
      email: "",
      password: "",
      rememberMe: false,
      passwordError: "",
    };
  },
};
</script>

<style>
/* Small devices (landscape phones, 576px and up) */
@media (max-width: 480px) {
  .login-logo {
    width: 15em;
  }
}
/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 481px) {
  .login-logo {
    width: 13em;
  }
}
/* Large devices (desktops, 992px and up) */
@media (min-width: 1100px) {
  .login-logo {
    width: 10em;
  }

  p,
  label,
  a {
    font-size: large;
  }
}
</style>
