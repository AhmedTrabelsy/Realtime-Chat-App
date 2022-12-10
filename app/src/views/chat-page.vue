<template>
  <div class="main-page d-flex">
    <div class="info glass-container" style="border: 5px solid transparent"></div>
    <div class="chat glass-container overflow-hidden" style="border: 2px solid transparent">
      <div class="container messages overflow-auto">
        <div
          v-for="(element, index) in msgs"
          :key="index"
          :class="{
            'justify-content-end': element.sender,
            'justify-content-start': !element.sender,
          }"
          class="d-flex my-2"
        >
          <div class="bg-dark rounded-circle avatar me-2" v-if="!element.sender"></div>
          <div class="bg-primary rounded text-light p-2">
            <span>{{ element.msg }}</span>
          </div>
          <div class="bg-dark rounded-circle avatar ms-2" v-if="element.sender"></div>
        </div>
        <div class="bottom" ref="bottom"></div>
      </div>
      <div class="d-flex fixed">
        <input type="text" v-model="msgValue" class="card msg-input rounded-0" placeholder="Write here " />
        <button type="submit" @click="sendMsg" class="sendBtn border btn btn-success rounded-0 px-4"><i class="bi bi-send"></i></button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "chatPage",
  components: {},
  data() {
    return {
      msgValue: "",
      msgs: [
        {
          msg: "Hello how are you ?",
          sender: true,
        },
        {
          msg: "Im fine and you ?",
          sender: false,
        },
        {
          msg: "Im fine as well",
          sender: true,
        },
        {
          msg: "Thanks for asking !",
          sender: true,
        },
        {
          msg: "Good to hear that",
          sender: false,
        },
        {
          msg: "Take care and enjoy your life buddy",
          sender: true,
        },
        {
          msg: "You too have a wonderful day !",
          sender: false,
        },
        {
          msg: "You too have a wonderful day !",
          sender: true,
        },
        {
          msg: "You too have a wonderful day !",
          sender: false,
        },
        {
          msg: "You too have a wonderful day !",
          sender: true,
        },
        {
          msg: "You too have a wonderful day !",
          sender: true,
        },
        {
          msg: "You too have a wonderful day !",
          sender: true,
        },
        {
          msg: "You too have a wonderful day !",
          sender: false,
        },
        {
          msg: "You too have a wonderful day !",
          sender: true,
        },
        {
          msg: "You too have a wonderful day !",
          sender: false,
        },
        {
          msg: "You too have a wonderful day !",
          sender: true,
        },
        {
          msg: "You too have a wonderful day !",
          sender: true,
        },
        {
          msg: "You too have a wonderful day !",
          sender: false,
        },
        {
          msg: "You too have a wonderful day !",
          sender: true,
        },
        {
          msg: "You too have a wonderful day !",
          sender: false,
        },
        {
          msg: "You too have a wonderful day !",
          sender: false,
        },
      ],
    };
  },
  mounted() {
    this.goToBottom();
  },
  methods: {
    goToBottom() {
      this.$refs["bottom"].scrollIntoView({ behavior: "smooth" });
    },
    sendMsg() {
      this.msgs.push({ msg: this.msgValue, sender: true });
      this.msgValue = "";
      this.goToBottom();
    },
  },
};
</script>

<style>
.messages {
  height: 90vh;
}

.bottom {
  width: 30px;
  height: 50px;
}

.msg-input {
  height: 50px;
  width: 100%;
  border: none;
}
.msg-input:focus {
  outline: none;
}

.sendBtn {
  padding: 0 40px;
}

p,
span,
a {
  font-size: small;
}

.main-page {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.info {
  width: 30vw;
  height: 93vh;
}

.chat {
  width: 63vw;
  height: 93vh;
}

.avatar {
  width: 42px;
  height: 42px;
}

/* Small devices (landscape phones, 576px and up) */
@media (max-width: 480px) {
  .chat {
    width: 90vw;
  }
}

/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 481px) {
  .chat {
    width: 70vw;
  }
}

/* Large devices (desktops, 992px and up) */
@media (min-width: 1600px) {
  .chat {
    width: 40vw;
  }

  p,
  label,
  a {
    font-size: large;
  }
}
</style>
