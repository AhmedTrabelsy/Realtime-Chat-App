<template>
  <div class="d-flex justify-content-center">
    <div class="register-container">
      <div class="login-logo container">
        <lottie animation="login" />
      </div>
      <div class="login-form-container">
        <register-header page="login" />
        <form
          @submit.prevent="handleSubmit"
          class="container d-flex flex-column"
        >
          <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input
              type="email"
              class="form-control bg-transparent mt-2"
              id="email"
              v-model="email"
              required
            />
          </div>
          <div class="form-group mb-1">
            <label for="password">Password</label>
            <input
              type="password"
              class="form-control bg-transparent mt-2"
              id="password"
              v-model="password"
              required
            />
            <p v-if="passwordError" class="text-warning password">
              {{ passwordError }}
            </p>
          </div>
          <div class="form-check">
            <input
              type="checkbox"
              class="form-check-input"
              id="remember"
              v-model="rememberMe"
            />
            <label class="form-check-label" for="remember">Remember me</label>
          </div>
          <button type="submit" class="btn btn-outline-danger submit-login">
            Login
          </button>
        </form>
        <div class="container text-center mt-4">
          <p>
            Don't Have an account ?
            <router-link :to="{ name: 'signup' }">Signup</router-link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import lottie from "@/components/lottie.vue";
import registerHeader from "@/components/register-header.vue";

export default {
  name: "loginPage",
  components: {
    lottie,
    registerHeader,
  },
  data() {
    return {
      lottie,
      email: "",
      password: "",
      rememberMe: false,
      passwordError: "",
    };
  },
  methods: {
    handleSubmit() {
      this.passwordError =
        this.password.length >= 8
          ? ""
          : "Password must be at least 8 chars long !";
      console.log(this.email);
      console.log(this.password);
      console.log(this.rememberMe);
    },
  },
};
</script>

<style>
input {
  background: transparent;
}

h1,
label,
p {
  color: #eee;
}

a {
  color: #d9ae50;
}

/* Small devices (landscape phones, 576px and up) */
@media (max-width: 480px) {
  .login-logo {
    width: 200px;
  }

  .submit-login {
    margin-top: 30px;
  }
}
/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 481px) {
  .login-logo {
    width: 200px;
  }

  .login-form-container {
    padding: 0 100px;
  }

  .submit-login {
    margin-top: 30px;
  }
}
/* Large devices (desktops, 992px and up) */
@media (min-width: 1100px) {
  .login-logo {
    width: 300px;
  }

  .login-form-container {
    padding: 0 100px;
  }

  p,
  label,
  a {
    font-size: large;
  }

  .submit-login {
    margin-top: 50px;
  }
}
</style>
