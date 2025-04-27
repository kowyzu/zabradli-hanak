<template>
  <form @submit="(event) => validateForm(event)" method="POST" class="pe-lg-5">
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
        <!-- <textarea class="form-control" id="message" rows="4"
          placeholder="Sdělte nám svou představu o ideálním zábradlí"></textarea> -->
        <MessageTextArea ref="messageTextArea" id="message" placeholder="Sdělte nám svou představu o ideálním zábradlí"
          v-model.trim="message" />
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Odeslat</button>
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
    }
  },
  methods: {
    validateForm(event) {
      event.preventDefault()
      console.log("hello");
    }
  }
}
</script>