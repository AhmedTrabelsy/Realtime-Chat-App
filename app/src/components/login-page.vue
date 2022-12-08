<template>
  <div class="container d-flex justify-content-center">
    <div class="login p-5">
      <div class="login-logo container">
        <Vue3Lottie :animationData="login" />
      </div>
      <div>
        <h1>Login</h1>
        <p>Welcome back please login to your account</p>
      </div>
      <form class="container">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" />
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="remember" />
          <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-outline-light">LogIn</button>
      </form>
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
    };
  },
};
</script>

<style>
.login {
  width: 40vw;
  height: 94vh;
  background-color: rgba(251, 251, 251, 0.25);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 30px;
  background-clip: padding-box;
}

.login-logo {
  width: 200px;
}

@media only screen and (max-width: 1200px) {
  /*Tablets [601px -> 1200px]*/
  .login {
    width: 90vw;
    height: 85vh;
  }
  .login-logo {
    width: 300px;
  }
}

@media only screen and (max-width: 600px) {
  /*Big smartphones [426px -> 600px]*/
  .login {
    width: 90vw;
    height: 85vh;
  }
  .login-logo {
    width: 100px;
  }
}

@media only screen and (max-width: 425px) {
  /*Small smartphones [325px -> 425px]*/
  .login {
    width: 90vw;
    height: 85vh;
  }

  .login-logo {
    width: 200px;
  }
}
</style>
