<template>
  <div id="app" :style="{ backgroundImage: 'url(' + background + ')' }">
    <login-page />
    <chatPage />
  </div>
</template>

<script>
import loginPage from "@/components/login-page.vue";
import chatPage from "@/components/chat-page.vue";

export default {
  name: "app",
  components: {
    loginPage,
    chatPage,
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
</style>
