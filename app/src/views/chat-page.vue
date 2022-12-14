<template>
  <div class="main-page d-flex">
    <div class="info glass-container pt-4" style="border: 5px solid transparent">
      <div class="d-flex flex-column px-5">
        <div class="d-flex user-info">
          <div class="avatar bg-warning rounded-circle profile-avatar" @click="accountPopUp"></div>
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
import userService from "@/services/quoteService.js";

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
    deleteUser() {
      userService
        .deleteUser(this.currentUser)
        .then((response) => {
          console.log(response.data);
          this.$router.push({ name: "home" });
        })
        .catch((error) => {
          console.log(error);
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
  },
};
</script>

<style>
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
