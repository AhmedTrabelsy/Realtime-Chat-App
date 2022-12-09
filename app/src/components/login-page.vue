<template>
  <div class="d-flex justify-content-center">
    <div class="login">
      <div class="login-logo container">
        <Vue3Lottie :animationData="login" />
      </div>
      <div class="login-form-container">
        <div class="container mb-3">
          <h1 class="display-3">Login</h1>
          <p>Welcome back please login to your account</p>
        </div>
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
            <router-link to="/signup">Signup</router-link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import login from "@/assets/animations/login.json";
import Vue3Lottie from "vue3-lottie";

export default {
  name: "loginPage",
  data() {
    return {
      Vue3Lottie,
      login,
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

<style scoped>
.login {
  background-color: rgba(251, 251, 251, 0.25);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 30px;
  background-clip: padding-box;
  padding: 5vw;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

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
  .login {
    width: 90vw;
    height: 85vh;
  }
  .login-logo {
    width: 200px;
  }

  .submit-login {
    margin-top: 30px;
  }
}
/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 481px) {
  .login {
    width: 70vw;
    height: 85vh;
    padding: 0 2vw;
  }
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
  .login {
    width: 40vw;
    height: 85vh;
    padding: 2vw;
  }

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
