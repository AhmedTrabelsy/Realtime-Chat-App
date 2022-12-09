<template>
  <div id="app" :style="{ backgroundImage: 'url(' + background + ')' }">
    <router-link :to="{ name: 'login' }"> Login |</router-link>
    <router-link :to="{ name: 'signup' }"> signup |</router-link>
    <router-link :to="{ name: 'home' }"> home |</router-link>
    <router-link :to="{ name: 'chat' }"> chat</router-link>
    <RouterView />
  </div>
</template>

<script>
export default {
  name: "app",
  components: {},
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
  font-family: "Montserrat", sans-serif;
}

#app {
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  width: 100vw;
  height: 100vh;
  padding: 3vh 3vw 0 3vw;
}

@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap");
</style>
