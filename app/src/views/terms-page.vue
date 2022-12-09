<template>
  <div class="terms overflow-auto">
    <termsConditions />
    <hr class="text-light" />
    <div class="container d-flex flex-column my-5">
      <button @click="termsAccepted" class="btn btn-success">
        I agree <i class="bi bi-check2-circle"></i>
      </button>
    </div>
  </div>
</template>

<script>
import termsConditions from "@/components/terms-conditions.vue";

export default {
  name: "loginPage",
  components: {
    termsConditions,
  },
  methods: {
    termsAccepted() {
      this.$router.back();
      this.$emit("termsAccepted");
    },
  },
};
</script>

<style scoped>
.terms {
  background-color: rgba(251, 251, 251, 0.25);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
  backdrop-filter: blur(50px);
  border: 1px solid rgba(255, 255, 255, 0.18);
  border-radius: 30px;
  background-clip: padding-box;
  padding: 5vw;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Small devices (landscape phones, 576px and up) */
@media (max-width: 480px) {
  .terms {
    width: 90vw;
    height: 85vh;
    padding: 6vw;
  }
}
/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 481px) {
  .terms {
    width: 70vw;
    height: 85vh;
    padding: 20px 5vw;
  }
}
/* Large devices (desktops, 992px and up) */
@media (min-width: 1100px) {
  .terms {
    width: 70vw;
    height: 85vh;
    padding: 2vw;
  }
}
</style>
