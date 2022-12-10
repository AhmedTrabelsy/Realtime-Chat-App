<template>
  <div class="bg-light rounded-circle avatar me-2" v-if="!sender"></div>
  <p :class="{ 'receiver text-dark': !sender, 'bg-primary': sender }" class="msg-container position-relative rounded text-light p-2">
    <span class="name position-absolute badge" v-if="!sender">{{ name }}</span>
    {{ msg }}
  </p>
  <div class="bg-warning rounded-circle avatar ms-2" v-if="sender"></div>
</template>

<script>
export default {
  name: "messageComponent",
  props: {
    name: {
      type: String,
      required: true,
    },
    msg: {
      type: String,
      required: true,
    },
    sender: {
      type: Boolean,
      required: true,
    },
  },
};
</script>
<style>
.msg-container {
  max-width: 50vw;
  text-overflow: ellipsis;
}
.msg-container .name {
  top: -16px;
  left: -5px;
}
</style>
