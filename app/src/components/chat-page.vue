<template>
  <div class="d-flex justify-content-between">
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

.info {
  width: 30vw;
  height: 93vh;
  background-color: rgba(0, 45, 226, 0.1);
  backdrop-filter: blur(30px);
  border: 5px solid transparent;
  border-radius: 20px;
  background-clip: padding-box;
}

.chat {
  width: 63vw;
  height: 93vh;
  background-color: rgba(202, 91, 248, 0.01);
  backdrop-filter: blur(30px);
  border: 2px solid transparent;
  border-radius: 30px;
  background-clip: padding-box;
}
</style>
