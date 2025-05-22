<template>
  <form novalidate @submit.prevent="handleFormSubmit()" method="POST" class="pe-lg-5">
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <NameInput ref="nameInput" id="name" placeholder="Jméno" v-model.trim="name" />
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <PhoneInput ref="phoneInput" id="phone" placeholder="Telefonní číslo" v-model.trim="phoneNumber"
          @error="handlePhoneError" />
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <EmailInput ref="emailInput" id="email" placeholder="E-mail" v-model.trim="email" @error="handleEmailError" />
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
  <!-- TODO: make toast reactive according to success/error status (collor of toas...) -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="success-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" ref="toastSuccess">
      <div class="toast-header">
        <img src="..." class="rounded me-2" alt="...">
        <strong class="me-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div v-if="success" class="toast-body form-msg form-success-msg">
        {{ statusMessage }}
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
      statusMessage: '',
      phoneError: '',
      emailError: '',
    }
  },
  methods: {
    // Handle errors emmited from EmailInput.vue and PhoneInput.vue components
    handlePhoneError(msg) {
      this.phoneError = msg;
    },
    handleEmailError(msg) {
      this.emailError = msg;
    },

    // Validate form inputs via specific validation methods from form conponents
    isFormValid() {

      //either mail or phonNumber is required
      if (!this.email.trim() && !this.phoneNumber.trim()) {
        this.error = 'Zadejte prosím e-mail nebo telefon.';
        this.displayToast(error);
        return false;
      }

      let isNameValid = this.$refs.nameInput.validate();
      let isPhoneValid = this.$refs.phoneInput.validate();
      let isEmailValid = this.$refs.emailInput.validate();
      let isMessageValid = this.$refs.messageTextArea.validate();


      // console.log("jmeno is valid?" + isNameValid + " error: " + this.error);
      // console.log("phone is valid?" + isPhoneValid + " error: " + this.error);
      // console.log("email is valid?" + isEmailValid + " error: " + this.phoneError);
      // console.log("Message is valid?" + isMessageValid + " error: " + this.error);


      if (!isNameValid || !isPhoneValid || !isEmailValid || !isMessageValid) {
        this.error = 'Zkontrolujte prosím zadané údaje';
        this.displayToast(error);
        return false;
      }

      this.error = null;
      return true;
    },

    // Put filled form data by user into object
    extractData() {
      let formFilledData = {
        "name": this.name,
        "phoneNumber": this.phoneNumber,
        "email": this.email,
        "message": this.message
      }
      return formFilledData
    },

    // POST filled form data to index.php
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
            this.displayToast(success);
            this.cleanForm();
          } else {
            this.error = data.message
          }
        })
        .catch((error) => {
          console.error('Error:', error);
          this.error = 'Nepodařilo se odeslat formulář.';
          this.displayToast(error);
        });

    },

    // After form submitting validate data, prepare object with filled data and post to index.php
    handleFormSubmit() {
      if (!this.isFormValid()) {
        console.log(this.error);
        return;
      };
      let formData = this.extractData();
      this.postData(formData);
    },

    // Display toast with statusMessage
    displayToast(status) {

      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(this.$refs.toastSuccess);
      toastBootstrap.show();
    },

    // Clean input values in form
    cleanForm() {
      this.name = '';
      this.phoneNumber = '';
      this.email = '';
      this.message = '';
    }
  }
}
</script>