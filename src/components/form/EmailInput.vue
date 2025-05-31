<template>
  <div>
    <div class="input-group">
      <div class="input-group-text"><i class="fa-solid fa-envelope fa-fw"></i></div>
      <!-- , { 'form-error-input': error } -->
      <input ref="emailInput" type="email" :class="['form-control']" :id="id" :placeholder="placeholder"
        :value="modelValue" @input="updateValue" @change="validate">
    </div>
    <div v-if="errorMsg" class="form-error-msg">
      {{ errorMsg }}
    </div>
  </div>
</template>

<script>
import { handleError } from 'vue'

export default {
  props: {
    id: String,
    placeholder: String,
    modelValue: String,
  },
  data() {
    return {
      error: null,
      errorMsg: '',
    };
  },
  methods: {
    updateValue(event) {
      this.$emit('update:modelValue', event.target.value);
    },
    handleError(errorDescription, type, displayErrorMsg = true) {
      // specify error and emit to ContactForm.vue
      this.error = { description: errorDescription, errorType: type };
      this.$emit('error', this.error);

      // display error under input element if it is wanted
      if (displayErrorMsg) {
        this.errorMsg = errorDescription;
      }

      return false;
    },
    validate() {
      if (!this.modelValue.trim()) {
        return this.handleError('Zadejte svůj e-mail.', 'missing', false);
      }
      if (this.$refs.emailInput.checkValidity() === false) {
        return this.handleError('Neplatná e-mailová adresa. Zadejte e-mail ve formátu: example@domena.cz', 'invalid')
      }
      this.error = null;
      this.errorMsg = '';
      this.$emit('error', null);
      return true;
    },
  },
};
</script>
