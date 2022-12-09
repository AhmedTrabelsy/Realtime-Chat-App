<template>
  <div class="app d-flex">
    <div class="info"></div>
    <div class="chat"></div>
  </div>
</template>

<script>
export default {
  name: "chatPage",
  components: {},
  data() {
    return {};
  },
};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
}
.app {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.info,
.chat {
  background-color: rgba(251, 251, 251, 0.25);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
  backdrop-filter: blur(40px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 30px;
  background-clip: padding-box;
}
.info {
  width: 30vw;
  height: 93vh;
  border: 5px solid transparent;
  border-radius: 20px;
}

.chat {
  width: 63vw;
  height: 93vh;
  border: 2px solid transparent;
  border-radius: 30px;
}
</style>
