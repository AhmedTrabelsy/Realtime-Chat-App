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
          <div class="bg-light rounded-circle avatar me-2" v-if="!element.sender"></div>
          <p class="bg-primary msg-container rounded text-light p-2">
            {{ element.msg }}
          </p>
          <div class="bg-warning rounded-circle avatar ms-2" v-if="element.sender"></div>
        </div>
        <div class="bottom" ref="bottom"></div>
      </div>
      <form class="d-flex fixed" @keyup.enter="goToBottom">
        <input type="text" v-model="msgValue" @focus="goToBottom" class="card msg-input rounded-0" placeholder="Write here " />
        <button type="submit" @click.prevent="sendMsg" class="sendBtn border btn btn-success rounded-0 px-4"><i class="bi bi-send"></i></button>
      </form>
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
      this.msgs.push({ msg: this.msgValue, sender: true });
      this.msgValue = "";
      this.goToBottom();
    },
  },
};
</script>

<style>
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
    font-size: large;
  }
}
</style>
