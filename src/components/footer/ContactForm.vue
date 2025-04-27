<template>
  <form novalidate @submit.prevent="handleFormSubmit()" method="POST" class="pe-lg-5">
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <NameInput ref="nameInput" id="name" placeholder="Jméno" v-model.trim="name" />
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <TelInput ref="telInput" id="tel" placeholder="Telefonní číslo" v-model.trim="phoneNumber" />
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <MailInput ref="mailInput" id="email" placeholder="E-mail" v-model.trim="mail" />
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
import TelInput from '../form/TelInput.vue';
import MailInput from '../form/MailInput.vue';
import MessageTextArea from '../form/MessageTextArea.vue';

export default {
  components: {
    NameInput,
    TelInput,
    MailInput,
    MessageTextArea,
  },
  data() {
    return {
      name: '',
      phoneNumber: '',
      mail: '',
      message: '',
      error: null,
    }
  },
  methods: {
    validateForm() {
      let isNameValid = this.$refs.nameInput.validate();
      let isPhoneValid = this.$refs.telInput.validate();
      let isMailValid = this.$refs.mailInput.validate();
      let isMessageValid = this.$refs.messageTextArea.validate();

      console.log("jmeno " + isNameValid);
      console.log("phone " + isPhoneValid);
      console.log("mail " + isMailValid);
      console.log("Message " + isMessageValid);


      if (!isNameValid || !isPhoneValid || !isMailValid || !isMessageValid) {
        return
      }

      this.error = null;
    },
    extractData() {
      let formFilledData = {
        "name": this.name,
        "phoneNumber": this.phoneNumber,
        "mail": this.mail,
        "message": this.message
      }
    },
    handleFormSubmit() {
      this.validateForm();
      let data = this.extractData();
      console.log(data);
    }
  }
}
</script>