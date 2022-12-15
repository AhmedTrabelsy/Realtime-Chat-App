<template>
  <div class="main-page d-flex">
    <div class="info glass-container pt-4" style="border: 5px solid transparent">
      <div class="d-flex flex-column px-5">
        <div class="d-flex user-info">
          <img class="avatar bg-warning rounded-circle profile-avatar" @click="accountPopUp" :src="avatar" alt="avatar" />
          <div class="name_email ms-2 mt-2">
            <h6>{{ full_name }} <i class="bi bi-trash deleteIcon" @click="confirm"></i> <i class="bi bi-box-arrow-right logoutIcon" @click="logout"></i></h6>
            <p>{{ email }}</p>
          </div>
        </div>
        <div class="search">
          <input type="search" class="form-control bg-transparent mt-2" @input="getUsers" v-model="search" placeholder="Search..." />
        </div>
        <hr />
      </div>
      <div class="contacts px-3 overflow-auto">
        <div
          v-for="(element, index) in users"
          :key="index"
          @click="
            switchConversation(element.user_id);
            getMessages();
          "
          class="msg_card mb-3 d-flex rounded p-2"
        >
          <img class="avatar bg-warning rounded-circle profile-avatar me-3" :src="avatar" alt="avatar" />
          <div class="d-flex flex-column">
            <h6>{{ element.full_name }}</h6>
            <p>Last Message !</p>
          </div>
        </div>
      </div>
    </div>
    <div class="chat glass-container overflow-hidden" style="border: 2px solid transparent">
      <div class="msg-header d-flex fixed rounded-0 px-4">
        <div class="d-flex align-items-center" v-if="currentReceiverName">
          <img class="avatar converstaionAvatar bg-warning rounded-circle me-3" :src="avatar" alt="avatar" />
          <h5 class="mt-2">{{ currentReceiverName }}</h5>
        </div>
      </div>
      <div class="container messages overflow-auto pb-3">
        <div v-if="this.msgs == null || this.msgs.length == 0" class="container empty">
          <lottieVue animation="empty" />
        </div>
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
          <messageComponent :name="element.full_name" :msg="element.message" :sender="element.sender" :lineBreak="element.lineBreak" :avatar="this.avatar" />
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
        <button v-if="msgValue" type="submit" class="sendBtn border btn btn-success px-4"><i class="bi bi-send"></i></button>
      </form>
    </div>
  </div>
</template>

<script>
import lottieVue from "@/components/lottie.vue";
import messageComponent from "@/components/message-component.vue";
import chatService from "@/services/chatService.js";
import userService from "@/services/userService.js";

export default {
  name: "chatPage",
  components: { messageComponent, lottieVue },
  data() {
    return {
      full_name: "",
      email: "",
      msgValue: "",
      msgs: null,
      currentUser: this.$route.params.id,
      currentReceiver: null,
      currentReceiverName: "",
      users: [],
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
    deleteUser() {
      userService
        .deleteUser(this.currentUser)
        .then(() => {
          // console.log(response.data);
          this.$router.push({ name: "home" });
        })
        .catch((error) => {
          console.log(error);
        });
    },
    switchConversation(user_id) {
      this.currentReceiver = user_id;
    },
    getReceiverName() {
      this.users.forEach((element) => {
        if (element.user_id == this.currentReceiver) {
          this.currentReceiverName = element.full_name;
        }
      });
    },
    goToBottom() {
      this.$refs["bottom"].scrollIntoView({ behavior: "smooth" });
    },
    sendMessage() {
      if (this.msgValue.length > 0) {
        this.msgs.push({ full_name: this.full_name, message: this.msgValue, sender: true, sender_id: this.currentUser });
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
        .getUsers(this.currentUser, this.search)
        .then((response) => {
          this.users = response.data[0];
          this.full_name = response.data[1].full_name;
          this.email = response.data[1].email;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getMessages() {
      this.getReceiverName();
      chatService
        .getMessages(this.currentReceiver, this.currentUser)
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
    updateInfo(name, email, password) {
      if (password.length < 8) {
        password = "";
      }
      this.full_name = name ? name : this.full_name;
      this.email = email ? email : this.email;
      userService
        .updateUser(this.currentUser, name, email, password)
        .then((response) => {
          if (response.data) {
            console.log("success");
          }
        })
        .catch((error) => {
          console.log(error);
        });
      this.Toast.fire({ icon: "success", title: "Info Updated!" });
    },
    async accountPopUp() {
      const { value: formValues } = await this.$swal.fire({
        icon: "info",
        title: "Edit",
        html:
          `<input id="name" class="swal2-input" placeholder="Full Name" value="${this.full_name}">` +
          `<input type="email" id="email" class="swal2-input" placeholder="Email" value="${this.email}">` +
          `<input type="password" id="password" class="swal2-input" placeholder="New Password"">`,
        focusConfirm: false,
        preConfirm: () => {
          return [document.getElementById("name").value, document.getElementById("email").value, document.getElementById("password").value];
        },
      });

      if (formValues) {
        //update
        this.updateInfo(formValues[0], formValues[1], formValues[2]);
      }
    },
    confirm() {
      this.$swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then((result) => {
          if (result.isConfirmed) {
            this.$swal.fire("Deleted!", "Your account has been deleted.", "success");
            this.deleteUser();
          }
        });
    },
    logout() {
      this.$router.push({ name: "home" });
    },
  },
  computed: {
    Toast() {
      return this.$swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", this.$swal.stopTimer);
          toast.addEventListener("mouseleave", this.$swal.resumeTimer);
        },
      });
    },
    avatar() {
      return require("../assets/avatar.png");
    },
  },
};
</script>

<style>
.sendBtn {
  border-radius: 0 0 30px 0;
}
.converstaionAvatar {
  width: 42px;
  height: 42px;
}
.msg-header {
  height: 50px;
  width: 100%;
  border: none;
  background-color: white;
  opacity: 0.6;
}
.empty {
  width: 38vh;
  margin-top: 20vh;
}
.deleteIcon {
  color: red;
}
.deleteIcon:hover {
  background-color: red;
  color: white;
  border-radius: 5px;
  padding: 2px;
}
.logoutIcon {
  color: rgb(255, 208, 0);
}
.logoutIcon:hover {
  background-color: rgb(255, 208, 0);
  color: white;
  border-radius: 5px;
  padding: 2px;
}
.user-info:hover {
  backdrop-filter: blur(1px);
  border-radius: 10px;
}
.contacts {
  max-height: 62vh;
}
.msg_card {
  backdrop-filter: blur(10px);
}
.msg_card:hover {
  background: rgba(255, 255, 255, 0.279);
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
    height: 87.7vh;
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
    height: 79vh;
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
