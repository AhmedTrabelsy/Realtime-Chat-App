<template>
  <div class="d-flex justify-content-center">
    <div class="signup">
      <div class="signup-logo container">
        <Vue3Lottie :animationData="signup" />
      </div>
      <div class="signup-form-container">
        <div class="container mb-3">
          <h1 class="display-3">Signup</h1>
          <p>Welcome back please create new account</p>
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
            <p v-if="passwordError != ''" class="text-warning password">
              {{ passwordError }}
            </p>
          </div>
          <div class="form-check">
            <input
              type="checkbox"
              class="form-check-input"
              id="remember"
              v-model="rememberMe"
              required
            />
            <label class="form-check-label" for="remember"
              >I agree to <a href="">Terms and Conditions</a></label
            >
          </div>
          <button type="submit" class="btn btn-outline-danger submit-signup">
            Signup
          </button>
        </form>
        <div class="container login text-center mt-4">
          <p>Already Have an account ? <a href="">Login</a></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import signup from "@/assets/animations/signup.json";
import Vue3Lottie from "vue3-lottie";

export default {
  name: "signupPage",
  data() {
    return {
      Vue3Lottie,
      signup,
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
.signup {
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
  color: yellow;
}

/* Small devices (landscape phones, 576px and up) */
@media (max-width: 480px) {
  .signup {
    width: 90vw;
    height: 85vh;
  }
  .signup-logo {
    width: 200px;
  }

  .submit-signup {
    margin-top: 30px;
  }
}
/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 481px) {
  .signup {
    width: 70vw;
    height: 85vh;
    padding: 0 2vw;
  }
  .signup-logo {
    width: 180px;
    margin-top: 20px;
  }

  .signup-form-container {
    padding: 0 100px;
  }

  .submit-signup {
    margin-top: 30px;
  }
}
/* Large devices (desktops, 992px and up) */
@media (min-width: 1600px) {
  .signup {
    width: 40vw;
    height: 85vh;
    padding: 2vw;
  }

  .signup-logo {
    width: 250px;
    margin-top: 25px;
    margin-bottom: 35px;
  }

  .signup-form-container {
    padding: 0 100px;
  }

  p,
  label,
  a {
    font-size: large;
  }

  .submit-signup {
    margin-top: 50px;
  }
}
</style>
