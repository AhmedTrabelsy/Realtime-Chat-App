<template>
  <div class="terms register-container overflow-auto">
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

<style>
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
