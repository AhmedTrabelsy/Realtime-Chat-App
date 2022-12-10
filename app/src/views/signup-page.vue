<template>
  <div class="d-flex justify-content-center">
    <div class="glass-container centred-container">
      <div class="signup-logo container">
        <lottieVue animation="signup" />
      </div>
      <div class="register-form-container">
        <registerHeader page="signup" />
        <form @submit.prevent="handleSubmit" class="container d-flex flex-column">
          <div class="form-group mb-3">
            <label for="name">Full Name</label>
            <input type="test" class="form-control bg-transparent" id="name" v-model="name" required />
          </div>
          <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control bg-transparent" id="email" v-model="email" required />
          </div>
          <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control bg-transparent" id="password" v-model="password" required />
            <p v-if="passwordError" class="text-warning password">
              {{ passwordError }}
            </p>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember" v-model="termsAcc" required />
            <label class="form-check-label" for="remember">
              I agree to
              <router-link :to="{ name: 'terms&conditions' }"> Terms and Conditions </router-link>
            </label>
          </div>
          <button type="submit" class="btn btn-outline-danger submit-register">SignUp</button>
        </form>
        <div class="container login text-center mt-2">
          <p>
            Already Have an account ?
            <router-link :to="{ name: 'login' }">Login</router-link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import lottieVue from "@/components/lottie.vue";
import registerHeader from "@/components/register-header.vue";

export default {
  name: "signupPage",
  components: {
    lottieVue,
    registerHeader,
  },
  data() {
    return {
      name: "",
      email: "",
      password: "",
      termsAcc: this.termsA,
      passwordError: "",
    };
  },
  methods: {
    handleSubmit() {
      this.passwordError = this.passwordErrorMsg;
      console.log(this.email);
      console.log(this.password);
      console.log(this.termsAcc);
    },
  },
  props: {
    termsA: {
      type: Boolean,
    },
  },

  computed: {
    passwordErrorMsg() {
      return this.password.length >= 8 ? "" : "Password must be at least 8 chars long !";
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
  .signup-logo {
    width: 12em;
  }
}
/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 481px) {
  .signup-logo {
    width: 20vh;
    margin-top: 20px;
  }
}
/* Large devices (desktops, 992px and up) */
@media (min-width: 1100px) {
  .signup-logo {
    width: 9rem;
    margin-top: 10px;
  }
  .submit-register {
    margin-top: 20px;
  }
}
</style>
