<template>
  <div class="bg-light rounded-circle avatar me-2" v-if="!sender"></div>
  <p :class="{ 'receiver text-dark': !sender, 'bg-primary': sender }" class="msg-container rounded text-light p-2">
    {{ msg }}
  </p>
  <div class="bg-warning rounded-circle avatar ms-2" v-if="sender"></div>
</template>

<script>
export default {
  name: "messageComponent",
  props: {
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
