<template>
  <div>
    <div class="input-group">
      <div class="input-group-text"><i class="fa-solid fa-phone fa-fw"></i></div>
      <input type="tel" :class="['form-control']" :id="id" name="name" :placeholder="placeholder" @input="onInput"
        @change="validate" :value="validationExecuted && !error ? formattedValue : modelValue">
    </div>
    <div v-if="errorMsg" class="form-error-msg">
      {{ errorMsg }}
    </div>
  </div>
</template>

<script>
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
      phoneRegex: /[^\d+]/,
      phoneRegexReplace: /[^\d+]/g,
      validationExecuted: false,
    };
  },
  computed: {
    formattedValue() {
      let digits = this.modelValue.replace(this.phoneRegexReplace, '');

      if (digits.startsWith('+') || digits.length > 6) {
        // Format the number with the country code (e.g., +420)
        return digits.replace(/(\+?\d{3})(\d{3})(\d{3})(\d{3})?/, (match, p1, p2, p3, p4) => {
          return p4 ? `${p1} ${p2} ${p3} ${p4}` : `${p1} ${p2} ${p3}`;
        }).trim();
      } else {
        // If no '+' is present, just format as a local number
        return digits.replace(/(\d{3})(\d{3})(\d{3})?/, (match, p1, p2, p3) => {
          return p3 ? `${p1} ${p2} ${p3}` : `${p1} ${p2}`;
        }).trim();
      }
    }
  },
  methods: {
    onInput(event) {
      const rawValue = event.target.value
      this.$emit('update:modelValue', rawValue);
    },
    handleError(errorDescription, type, displayErrorMsg = true) {
      // Specify error and emit to ContactForm.vue
      this.error = { description: errorDescription, errorType: type };
      this.$emit('error', this.error);

      // Display error under input element if it is wanted
      if (displayErrorMsg) {
        this.errorMsg = errorDescription;
        return
      }

      this.errorMsg = '';
      return;
    },
    validate() {
      this.validationExecuted = true;
      let trimmedValue = (this.modelValue.trim()).replaceAll(' ', '');
      let trimmedValueNoPlusSign = trimmedValue.replace('+', '');

      if (!trimmedValue) {
        return this.handleError('Zadejte své telefonní číslo.', 'missing', false);
      }
      if (this.phoneRegex.test(trimmedValue)) {
        return this.handleError('Telefonní číslo obsahuje nepovolené znaky.', 'invalid');
      }
      if (trimmedValueNoPlusSign.length > 12) {
        return this.handleError('Telefonní číslo nesmí mít více než 12 číslic.', 'invalid');
      }
      if (trimmedValueNoPlusSign.length >= 1 && trimmedValueNoPlusSign.length < 9) {
        return this.handleError('Telefonní číslo musí mít alespoň 9 číslic.', 'invalid');
      }
      this.error = null;
      this.errorMsg = '';
      this.$emit('error', null);
      return true;
    },
    cleanErrors() {
      this.error = null;
      this.errorMsg = '';
      this.$emit('error', null);
    }
  },
};
</script>
