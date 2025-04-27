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
        <div class="input-group">
          <div class="input-group-text"><i class="fa-solid fa-envelope fa-fw"></i></div>
          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
        </div>
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
          placeholder="Sdělte nám svou představu o ideálním zábradlí"></textarea>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Odeslat</button>
  </form>
</template>

<script>
import NameInput from '../form/NameInput.vue';
import TelInput from '../form/TelInput.vue';

export default {
  components: {
    NameInput,
    TelInput,
  },
  data() {
    return {
      name: '',
      phoneNumber: '',

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