<template>
  <div>
    <div class="input-group">
      <div class="input-group-text"><i class="fa-solid fa-envelope fa-fw"></i></div>
      <input ref="mailInput" type="email" :class="['form-control', { 'form-error-input': error }]" :id="id"
        :placeholder="placeholder" :value="modelValue" @input="updateValue" @blur="validate">
    </div>
    <div v-if="error" class="form-error-msg">
      {{ error }}
    </div>
  </div>
</template>

<script>
import { } from 'vue'

export default {
  props: {
    id: String,
    placeholder: String,
    modelValue: String,
  },
  data() {
    return {
      error: '',
    };
  },
  methods: {
    updateValue(event) {
      this.$emit('update:modelValue', event.target.value);
    },
    validate() {
      if (!this.modelValue.trim()) {
        this.error = 'Zadejte svůj e-mail.';
        return false;
      }
      if (this.$refs.mailInput.checkValidity() === false) {
        this.error = 'Neplatná e-mailová adresa. Zadejte e-mail ve formátu: example@domena.cz';
        return false;
      }
      this.error = '';
      return true;
    },
  },
};
</script>
