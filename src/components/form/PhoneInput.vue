<template>
  <div>
    <div class="input-group">
      <div class="input-group-text"><i class="fa-solid fa-phone fa-fw"></i></div>
      <input type="tel" :class="['form-control', { 'form-error-input': error }]" :id="id" name="name"
        :placeholder="placeholder" :value="formattedValue" @input="onInput" @change="validate">
    </div>
    <div v-if="error" class="form-error-msg">
      {{ error }}
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
    };
  },
  computed: {
    formattedValue() {
      let digits = this.modelValue.replace(/[^\d+]/g, '');

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
      const rawValue = event.target.value.replace(/^(\+)?|[^\d]/g, (match, plus) => plus ? '+' : ''); // only numbers + sign
      this.$emit('update:modelValue', rawValue);
    },
    handleError(errorDescription) {
      this.error = errorDescription;
      this.$emit('error', this.error);
      return false;
    },
    validate() {
      let trimmedValue = this.modelValue.trim();
      let trimmedValueNoPlusSign = trimmedValue.replace('+', '');

      if (/[a-zA-Z]/.test(trimmedValueNoPlusSign)) {
        return this.handleError('Telefonní číslo nesmí obsahovat písmena.');
      }
      if (trimmedValueNoPlusSign.length > 12) {
        return this.handleError('Telefonní číslo nesmí mít více než 12 číslic.');
      }
      if (trimmedValueNoPlusSign.length >= 1 && trimmedValueNoPlusSign.length < 9) {
        return this.handleError('Telefonní číslo musí mít alespoň 9 číslic.');
      }
      this.error = null;
      this.$emit('error', null);
      return true;
    },
  },
};
</script>
