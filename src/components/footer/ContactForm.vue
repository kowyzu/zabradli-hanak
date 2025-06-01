<template>
  <form novalidate @submit.prevent="handleFormSubmit()" method="POST" class="pe-lg-5">
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <NameInput ref="nameInput" id="name" placeholder="Jméno" v-model.trim="name" />
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <PhoneInput :class="{ 'form-error-missing': phoneError }" ref="phoneInput" id="phone"
          placeholder="Telefonní číslo" v-model.trim="phoneNumber" @error="handlePhoneError"
          @change="requirePhoneOrEmail" />
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <EmailInput :class="{ 'form-error-missing': emailError }" ref="emailInput" id="email" placeholder="E-mail"
          v-model.trim="email" @error="handleEmailError" @change="requirePhoneOrEmail" />
      </div>
    </div>
    <div v-if="phoneOrEmailMissing" class="row mb-3 justify-content-center">
      <div class="form-error-msg">
        Zadejte prosím e-mail nebo telefon.
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <MessageTextArea ref="messageTextArea" id="message" placeholder="Sdělte nám svou představu o ideálním zábradlí"
          v-model.trim="message" />
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col" style="display: block; flex-flow: row;">
        <div class="cf-turnstile" :data-sitekey="getSiteKeyEnv()" data-size="flexible"
          data-callback="onTurnstileSuccess" data-language="cs" data-theme="light" ref="turnstile"></div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" :disabled="postBtnDisabled">Odeslat</button>
  </form>

  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="success-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" ref="toast"
      data-bs-autohide="false">
      <div class="toast-header" :class="{ 'bg-danger-subtle': error, 'bg-success-subtle': !error }">
        <strong v-if="error" class="me-auto toast-error text-danger"><i class="fa-solid fa-triangle-exclamation"></i>
          Chyba</strong>
        <strong v-if="!error" class="me-auto toast-success text-success"><i class="fa-solid fa-check"></i>
          Formulář byl úspěšně odeslán</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body form-msg form-success-msg">
        {{ statusMessage }}
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted } from 'vue';
import * as bootstrap from "bootstrap";
import NameInput from '../form/NameInput.vue';
import PhoneInput from '../form/PhoneInput.vue';
import EmailInput from '../form/EmailInput.vue';
import MessageTextArea from '../form/MessageTextArea.vue';

export default {
  mounted() {
    window.onTurnstileSuccess = this.onTurnstileSuccess;
  },
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
      phoneOrEmailMissing: null,
      postBtnDisabled: false,
      turnstileToken: '',
    }
  },
  methods: {
    onTurnstileSuccess(token) {
      this.turnstileToken = token;
    },
    getSiteKeyEnv() {
      return import.meta.env.VITE_TURNSTILE_SITE_KEY;
    },
    // Handle errors emmited from EmailInput.vue and PhoneInput.vue components
    handlePhoneError(msg) {
      this.phoneError = msg;
    },

    handleEmailError(msg) {
      this.emailError = msg;
    },

    // After input in Email/Phone check if at least one of them is correctly filled
    requirePhoneOrEmail() {
      let isPhoneValid = this.$refs.phoneInput.validate();
      let isEmailValid = this.$refs.emailInput.validate();

      if (!isPhoneValid && !isEmailValid && this.phoneError.errorType === 'missing' && this.emailError.errorType === 'missing') {
        this.error = true;
        this.phoneOrEmailMissing = true;
        return false;
      }

      if (this.emailError && isPhoneValid) {
        this.emailError = ''
      }

      if (this.phoneError && isEmailValid) {
        this.phoneError = ''
      }

      this.phoneOrEmailMissing = null;
      return true;
    },

    // Validate form inputs via specific validation methods from form conponents
    isFormValid() {

      let isNameValid = this.$refs.nameInput.validate();
      let isPhoneValid = this.$refs.phoneInput.validate();
      let isEmailValid = this.$refs.emailInput.validate();
      let isMessageValid = this.$refs.messageTextArea.validate();


      // Either mail or phonNumber is required
      if (!this.requirePhoneOrEmail()) {
        this.error = true;
        this.phoneOrEmailMissing = true;
        return false;
      }

      this.phoneOrEmailMissing = null;

      if (!isNameValid || !isMessageValid || (!isEmailValid && !isPhoneValid)) {
        this.error = true;
        return false;
      }

      this.error = null;
      this.phoneOrEmailMissing = false;
      this.phoneError = '';
      this.emailError = '';
      return true;
    },

    // Put filled form data by user into object
    extractData() {
      let formFilledData = {
        "name": this.name,
        "phoneNumber": this.phoneNumber,
        "email": this.email,
        "message": this.message,
        "turnstileToken": this.turnstileToken,
      }
      return formFilledData
    },

    // POST filled form data to index.php
    postData(formData) {
      const formUrl = import.meta.env.VITE_CONTACT_FORM_URL;
      fetch(formUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json; charset=UTF-8',
        },
        body: JSON.stringify(formData),
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            this.statusMessage = 'Děkujeme za zprávu, brzy se ozveme.';
            this.displayToast();
            this.cleanForm();
          } else {
            this.error = true
            this.statusMessage = data.message
            this.displayToast();
          }
        })
        .catch((error) => {
          this.error = true
          this.statusMessage = 'Nepodařilo se odeslat formulář. Zkuste to, prosím, znovu.';
          this.displayToast();
        });

    },

    // When the form is posted the post btn is disabled for avoiding multiple form posts
    disablePostButton() {
      this.postBtnDisabled = true;
    },

    // After form submitting validate data, prepare object with filled data and post to index.php
    handleFormSubmit() {
      if (!this.isFormValid()) {
        return;
      };
      let formData = this.extractData();
      this.disablePostButton();
      this.postData(formData);
    },

    // Display toast with statusMessage
    displayToast() {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(this.$refs.toast);
      toastBootstrap.show();
    },

    // Clean input values in form
    cleanForm() {
      this.name = '';
      this.phoneNumber = '';
      this.email = '';
      this.message = '';
      this.phoneError = null;
      this.emailError = null;
      this.phoneOrEmailMissing = null;
      this.error = null;
      this.$refs.phoneInput.cleanErrors();
      this.$refs.emailInput.cleanErrors();
    }
  }
}
</script>