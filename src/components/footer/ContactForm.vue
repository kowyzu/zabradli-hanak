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
    <!-- <div v-if="error" class="form-msg form-error-msg">
      {{ error }}
    </div>
    <div v-if="success" class="form-msg form-success-msg">
      {{ success }}
    </div> -->
  </form>
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="success-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" ref="toastSuccess">
      <div class="toast-header">
        <img src="..." class="rounded me-2" alt="...">
        <strong class="me-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div v-if="success" class="toast-body form-msg form-success-msg">
        {{ success }}
      </div>
    </div>
  </div>
</template>

<script>
import * as bootstrap from "bootstrap";
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
      success: null,
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
    postData(formData) {
      fetch('http://localhost:8080/index.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify(formData),
      })
        .then(response => response.json())
        .then(data => {
          console.log('Success:', data);
          if (data.success) {
            this.error = null;
            this.success = 'Formulář byl úspěšně odeslán.';
            this.displayToast();
          } else {
            this.error = data.message
          }
        })
        .catch((error) => {
          console.error('Error:', error);
          this.error = 'Nepodařilo se odeslat formulář.';
        });

    },
    handleFormSubmit() {
      if (!this.isFormValid()) {
        return;
      };
      let formData = this.extractData();
      this.postData(formData);
    },
    displayToast() {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(this.$refs.toastSuccess);
      toastBootstrap.show();
    }
  }
}
</script>