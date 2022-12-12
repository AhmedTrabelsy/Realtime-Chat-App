<template>
  <div class="main-page d-flex">
    <div class="info glass-container pt-4" style="border: 5px solid transparent">
      <div class="d-flex flex-column px-5">
        <div class="d-flex">
          <div class="avatar bg-warning rounded-circle profile-avatar"></div>
          <div class="name_email ms-2 mt-2">
            <h6>{{ full_name }}</h6>
            <p>{{ email }}</p>
          </div>
        </div>
        <div class="search">
          <input type="search" class="form-control bg-transparent mt-2" v-model="search" placeholder="Search..." />
        </div>
        <hr />
      </div>
      <div class="contacts px-3 overflow-auto">
        <div v-for="(element, index) in users" :key="index" class="msg_card mb-3 d-flex rounded p-2">
          <div class="avatar bg-warning rounded-circle profile-avatar me-3"></div>
          <div class="d-flex flex-column">
            <h6>{{ element.full_name }}</h6>
            <p>Last Message !</p>
          </div>
        </div>
      </div>
    </div>
    <div class="chat glass-container overflow-hidden" style="border: 2px solid transparent">
      <div class="container messages overflow-auto pb-3">
        <div
          v-for="(element, index) in msgs"
          :key="index"
          :class="{
            'justify-content-end': element.sender,
            'justify-content-start': !element.sender,
            'mt-4': element.lineBreak,
          }"
          class="d-flex"
        >
          <messageComponent :name="element.full_name" :msg="element.message" :sender="element.sender" :lineBreak="element.lineBreak" />
        </div>
        <div class="bottom" ref="bottom"></div>
      </div>
      <form class="d-flex fixed" @keyup.enter="sendMessage" @submit.prevent="sendMessage">
        <input
          type="text"
          v-model="msgValue"
          @focus="
            getMessages();
            goToBottom();
          "
          class="msg-input rounded-0 px-4"
          placeholder=" Type a message"
        />
        <button v-if="msgValue" type="submit" class="sendBtn border btn btn-success rounded-0 px-4"><i class="bi bi-send"></i></button>
      </form>
    </div>
  </div>
</template>

<script>
import messageComponent from "@/components/message-component.vue";
import chatService from "@/services/chatService.js";
import userService from "@/services/userService.js";

export default {
  name: "chatPage",
  components: { messageComponent },
  data() {
    return {
      full_name: "",
      email: "",
      msgValue: "",
      msgs: null,
      currentUser: this.$route.params.id,
      currentReceiver: 1,
      users: null,
      session: false,
      search: "",
    };
  },
  beforeCreate: function () {
    // if (!this.$session.exists()) {
    //   this.$router.push("-1");
    // }
  },
  // methods: {
  //   logout: function () {
  //     this.$session.destroy()
  //     this.$router.push('/')
  //   }
  // },
  mounted() {
    this.getUsers();
    this.getMessages();
    // userService
    //   .verifySession()
    //   .then((response) => {
    //     this.session = response.data;
    //     console.log(response.data);
    //   })
    //   .catch((error) => {
    //     console.log(error);
    //   });
    // if (this.session == false) {
    //   this.$router.push({ name: "login" });
    // }
  },
  methods: {
    goToBottom() {
      this.$refs["bottom"].scrollIntoView({ behavior: "smooth" });
    },
    sendMessage() {
      if (this.msgValue.length > 0) {
        this.msgs.push({ full_name: "test", message: this.msgValue, sender: true, sender_id: this.currentUser });
        //push msg to database
        chatService.sendMsg(this.currentUser, this.currentReceiver, this.msgValue).then(() => {
          // console.log(response);
        });
        this.msgValue = "";
      }
      this.filterMessages();
      this.goToBottom();
    },
    getUsers() {
      userService
        .getUsers(this.currentUser)
        .then((response) => {
          this.users = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getMessages() {
      chatService
        .getMessages()
        .then((response) => {
          this.msgs = response.data;
          this.filterMessages();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    filterMessages() {
      this.msgs.forEach((element, index) => {
        if (element.sender_id == this.currentUser) {
          element.sender = true;
          this.full_name = element.full_name;
          this.email = element.email;
        } else {
          element.sender = false;
        }
        if (index == 0) {
          element.lineBreak = true;
        }
        if (this.msgs[index + 1] != undefined) {
          if (element.sender_id != this.msgs[index + 1].sender_id) {
            this.msgs[index + 1].lineBreak = true;
          } else {
            this.msgs[index + 1].lineBreak = false;
          }
        }
      });
    },
  },
};
</script>

<style>
.contacts {
  max-height: 62vh;
}
.msg_card {
  backdrop-filter: blur(10px);
}

.receiver {
  background-color: #f0f0f0;
}

.messages {
  height: 80.7vh;
}

.msg-input {
  height: 50px;
  width: 100%;
  border: none;
  background-color: white;
  opacity: 0.6;
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
  width: 25vw;
  height: 93vh;
}

.chat {
  width: 63vw;
  height: 93vh;
}

.profile-avatar {
  width: 60px;
  height: 60px;
}

h6,
p,
hr {
  color: #eee;
}
p {
  opacity: 0.7;
}

.search * {
  backdrop-filter: blur(20px);
  /* background: transparent
    url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'%3E%3C/path%3E%3C/svg%3E")
    no-repeat 13px center; */
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
    height: 93.4vh;
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
  .messages {
    height: 85.6vh;
  }
}

/* Large devices (desktops, 992px and up) */
@media (min-width: 1600px) {
  .chat {
    width: 40vw;
  }
  .profile-avatar {
    width: 100px;
    height: 100px;
  }
  .name_email h6 {
    font-size: xx-large;
  }
  .name_email p {
    font-size: large;
  }
}
</style>
