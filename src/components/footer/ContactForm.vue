<template>
  <form novalidate @submit.prevent="handleFormSubmit()" method="POST" class="pe-lg-5">
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <NameInput ref="nameInput" id="name" placeholder="Jméno" v-model.trim="name" />
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <PhoneInput ref="phoneInput" id="phone" placeholder="Telefonní číslo" v-model.trim="phoneNumber" />
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <EmailInput ref="emailInput" id="email" placeholder="E-mail" v-model.trim="email" />
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <MessageTextArea ref="messageTextArea" id="message" placeholder="Sdělte nám svou představu o ideálním zábradlí"
          v-model.trim="message" />
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Odeslat</button>
    <div v-if="error" class="form-error-msg">
      {{ error }}
    </div>
  </form>
</template>

<script>
import NameInput from '../form/NameInput.vue';
import PhoneInput from '../form/PhoneInput.vue';
import EmailInput from '../form/EmailInput.vue';
import MessageTextArea from '../form/MessageTextArea.vue';

export default {
  components: {
    NameInput,
    PhoneInput,
    EmailInput,
    MessageTextArea,
  },
  data() {
    return {
      name: '',
      phoneNumber: '',
      email: '',
      message: '',
      error: null,
    }
  },
  methods: {
    isFormValid() {
      let isNameValid = this.$refs.nameInput.validate();
      let isPhoneValid = this.$refs.phoneInput.validate();
      let isEmailValid = this.$refs.emailInput.validate();
      let isMessageValid = this.$refs.messageTextArea.validate();

      console.log("jmeno " + isNameValid);
      console.log("phone " + isPhoneValid);
      console.log("email " + isEmailValid);
      console.log("Message " + isMessageValid);


      if (!isNameValid || !isPhoneValid || !isEmailValid || !isMessageValid) {
        return false;
      }

      this.error = null;
      return true;
    },
    extractData() {
      let formFilledData = {
        "name": this.name,
        "phoneNumber": this.phoneNumber,
        "email": this.email,
        "message": this.message
      }
      return formFilledData
    },
    handleFormSubmit() {
      if (!this.isFormValid()) {
        return;
      };
      let data = this.extractData();
      console.log(data);
    }
  }
}
</script>