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
          <p v-if="passwordError" class="text-warning passwordError">
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
import userService from "@/services/userService.js";
export default {
  name: "loginPage",
  components: {
    lottieVue,
    registerHeader,
  },
  data() {
    return {
      full_name: "",
      email: "",
      password: "",
      rememberMe: false,
      passwordError: "",
      authorised: false,
    };
  },
  methods: {
    handleSubmit() {
      this.passwordError = this.passwordErrorMsg;
      if (this.passwordError == "") {
        userService
          .getUser(this.email, this.password)
          .then((response) => {
            this.authorised = response.data.user_id;
            console.log(typeof response.data);
            if (this.authorised) {
              this.full_name = response.data.full_name;
              this.email = response.data.email;
              this.$router.push({ name: "chatPage", params: { id: response.data.user_id } });
              this.Toast.fire({ icon: "success", title: "Login Successfully!" });
            } else {
              this.Toast.fire({ icon: "error", title: "Please Verify Your Informations" });
            }
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
  },
  computed: {
    passwordErrorMsg() {
      return this.password.length >= 8 ? "" : "Password must be at least 8 chars long !";
    },
    Toast() {
      return this.$swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", this.$swal.stopTimer);
          toast.addEventListener("mouseleave", this.$swal.resumeTimer);
        },
      });
    },
  },
  mounted() {},
};
</script>

<style>
.passwordError {
  padding: 0;
}
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
    width: 12em;
  }

  p,
  label,
  a {
    font-size: small;
  }
}
</style>
