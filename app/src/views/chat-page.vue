<template>
  <div class="main-page d-flex">
    <!-- <div
      class="info glass-container"
      style="border: 5px solid transparent"
    ></div> -->
    <div class="chat glass-container overflow-auto d-flex flex-column-reverse" style="border: 2px solid transparent">
      <div v-for="element in msgs" :key="element" :class="{ 'justify-content-end': element.sender, 'justify-content-start': !element.sender }" class="d-flex my-2">
        <div class="bg-dark rounded-circle avatar me-2" v-if="!element.sender"></div>
        <div class="bg-primary rounded text-light p-2">
          <span>{{ element.msg }}</span>
        </div>
        <div class="bg-dark rounded-circle avatar ms-2" v-if="element.sender"></div>
      </div>
      <input type="text" placeholder="Write here " />
    </div>
  </div>
</template>

<script>
export default {
  name: "chatPage",
  components: {},
  data() {
    return {
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
};
</script>

<style>
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
