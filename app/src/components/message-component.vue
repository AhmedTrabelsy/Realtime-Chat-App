<template>
  <img class="bg-light rounded-circle msg-avatar me-2" v-if="!sender && lineBreak" :src="avatar" alt="avatar" />
  <div v-else class="msg-avatar me-2"></div>
  <p
    @click="$emit('delete', this.message_id)"
    style="margin: 0"
    :class="{ 'receiver text-dark': !sender, 'bg-primary': sender }"
    class="msg-container position-relative rounded text-light p-2 mt-1"
  >
    <span class="name position-absolute badge" v-if="!sender && lineBreak">{{ name }}</span>
    {{ msg }}
  </p>
  <img :src="avatar" alt="avatar" class="bg-warning rounded-circle msg-avatar ms-2" v-if="sender && lineBreak" />
  <div v-else class="msg-avatar me-2"></div>
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
    lineBreak: {
      type: Boolean,
      required: true,
    },
    avatar: {
      type: String,
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
.msg-avatar {
  width: 42px;
  height: 42px;
}
</style>
