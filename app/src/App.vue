<template>
  <div id="app" :style="{ backgroundImage: 'url(' + background + ')' }">
    <RouterView @termsAccepted="termsAccepted" :termsA="termsAcc" />
  </div>
</template>

<script>
export default {
  name: "app",
  components: {},
  data() {
    return {
      background: require("../src/assets/background.jpg"),
      termsAcc: false,
    };
  },
  methods: {
    termsAccepted() {
      this.termsAcc = true;
    },
  },
};
document.title = "TuniChat";
</script>

<style>
.bluryButton {
  backdrop-filter: blur(10px);
}
html,
body {
  max-height: 100vh;
  height: 100%;
  overflow: hidden;
}

* {
  font-family: "Montserrat", sans-serif;
}

#app {
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  width: 100vw;
  height: 100vh;
}

.glass-container {
  background-color: rgba(251, 251, 251, 0.25);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
  backdrop-filter: blur(40px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 30px;
  background-clip: padding-box;
}

.centred-container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Small devices (landscape phones, 576px and up) */
@media (max-width: 480px) {
  .centred-container {
    width: 90vw;
    height: 85vh;
    padding: 7vw;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .submit-register {
    margin-top: 30px;
  }
}
/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 481px) {
  .centred-container {
    width: 70vw;
    height: 85vh;
    padding: 0 2vw;
  }

  .register-form-container {
    padding: 0 50px;
  }

  .submit-register {
    margin-top: 30px;
  }
}
/* Large devices (desktops, 992px and up) */
@media (min-width: 1025px) {
  .centred-container {
    width: 45vw;
    height: 85vh;
    padding: 1vw;
  }

  .register-form-container {
    padding: 0 50px;
  }

  .submit-register {
    margin-top: 50px;
  }
}

@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap");
</style>
