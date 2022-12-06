<template>
  <div id="app" :style="{ backgroundImage: 'url(' + background + ')' }">
    <div class="d-flex justify-content-between">
      <div class="managing"></div>
      <div class="chat"></div>
    </div>
    <login-page />
  </div>
</template>

<script>
import loginPage from "@/components/login-page.vue";

export default {
  name: "app",
  components: {
    loginPage,
  },
  data() {
    return {
      background: require("../src/assets/background.jpg"),
    };
  },
};
document.title = "TuniChat";
</script>

<style scoped>
/* html,
body {
  margin: 0;
  height: 100%;
  overflow: hidden;
} */

* {
  margin: 0;
  padding: 0;
}

#app {
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  width: 100vw;
  height: 100vh;
  padding: 3vh 3vw 0 3vw;
}

.managing {
  width: 30vw;
  height: 93vh;
  background-color: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(30px);
  border: 2px solid transparent;
  border-radius: 2%;
  background-clip: padding-box;
}

.chat {
  width: 63vw;
  height: 93vh;
  background-color: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(30px);
  border: 2px solid transparent;
  border-radius: 2%;
  background-clip: padding-box;
}
</style>
