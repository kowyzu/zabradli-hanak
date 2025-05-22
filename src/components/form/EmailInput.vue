<template>
  <div>
    <div class="input-group">
      <div class="input-group-text"><i class="fa-solid fa-envelope fa-fw"></i></div>
      <input ref="emailInput" type="email" :class="['form-control', { 'form-error-input': error }]" :id="id"
        :placeholder="placeholder" :value="modelValue" @input="updateValue" @change="validate">
    </div>
    <div v-if="error" class="form-error-msg">
      {{ error }}
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
    };
  },
  methods: {
    updateValue(event) {
      this.$emit('update:modelValue', event.target.value);
    },
    handleError(errorDescription) {
      this.error = errorDescription;
      this.$emit('error', this.error);
      return false;
    },
    validate() {
      // if (!this.modelValue.trim()) {
      //   return this.handleError('Zadejte svůj e-mail.')
      // }
      if (this.$refs.emailInput.checkValidity() === false) {
        return this.handleError('Neplatná e-mailová adresa. Zadejte e-mail ve formátu: example@domena.cz')
      }
      this.error = null;
      this.$emit('error', null);
      return true;
    },
  },
};
</script>
