<template>
  <form @submit="(event) => validateForm(event)" method="POST" class="pe-lg-5">
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <div class="input-group">
          <div class="input-group-text"><i class="fa-solid fa-user fa-fw"></i></div>
          <input v-model.trim="name" type="text" class="form-control" id="inputName" name="name" placeholder="Jméno">
        </div>
      </div>
    </div>
    <div class="row mb-3 justify-content-center">
      <div class="col">
        <div class="input-group">
          <div class="input-group-text"><i class="fa-solid fa-phone fa-fw"></i></div>
          <input type="tel" class="form-control" id="inputTel" placeholder="Telefonní číslo">
        </div>
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
export default {
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