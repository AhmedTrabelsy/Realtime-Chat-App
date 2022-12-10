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
          <messageComponent :msg="element.msg" :sender="element.sender" />
        </div>
        <div class="bottom" ref="bottom"></div>
      </div>
      <form class="d-flex fixed" @keyup.enter="sendMsg">
        <input type="text" v-model="msgValue" @focus="goToBottom" class="card msg-input rounded-0 px-4" placeholder=" Type a message" />
        <button v-if="msgValue" type="submit" @click.prevent="sendMsg" class="sendBtn border btn btn-success rounded-0 px-4"><i class="bi bi-send"></i></button>
      </form>
    </div>
  </div>
</template>

<script>
import messageComponent from "@/components/message-component.vue";

export default {
  name: "chatPage",
  components: { messageComponent },
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
          msg: "You too have a wonderfun Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta et, non molestias, mollitia quo recusandae quisquam reiciendis alias fuga rerum quos itaque fugiat deserunt nam vero reprehenderit exercitationem minima repudiandae! Natus reprehenderit asperiores tenetur culpa libero omnis aspernatur odio assumenda aliquid quam, tempora possimus? Omnis laboriosam veritatis eligendi sed sunt sit, culpa quisquam eaque, dolores repudiandae repellat recusandae adipisci.lorem day !",
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
      if (this.msgValue.length > 0) {
        this.msgs.push({ msg: this.msgValue, sender: true });
        this.msgValue = "";
      }
      this.goToBottom();
    },
  },
};
</script>

<style>
.receiver {
  background-color: #f0f0f0;
}
.msg-container {
  max-width: 50vw;
  overflow: hidden;
  text-overflow: ellipsis;
}
.messages {
  height: 88vh;
}

.msg-input {
  height: 50px;
  width: 100%;
  border: none;
}
.msg-input:focus {
  outline: none;
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
    width: 100vw;
    height: 100vh;
    border: none;
    border-radius: 0;
  }

  .msg-container {
    max-width: 65vw;
  }

  .messages {
    height: 95vh;
  }

  .info {
    display: none;
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
    font-size: small;
  }
}
</style>
