<template>
  <div>
    <div class="input-group">
      <div class="input-group-text"><i class="fa-solid fa-phone fa-fw"></i></div>
      <input type="tel" :class="['form-control', { 'form-error-input': error }]" :id="id" name="name"
        :placeholder="placeholder" :value="formattedValue" @input="onInput" @blur="validate">
    </div>
    <div v-if="error" class="form-error-msg">
      Zadejte své telefonní číslo.
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
      error: '',
    };
  },
  computed: {
    formattedValue() {
      const digits = this.modelValue.replace(/\D/g, '');
      return digits.replace(/(\d{3})(\d{3})(\d{3,})?/, (match, p1, p2, p3) => {
        return p3 ? `${p1} ${p2} ${p3}` : `${p1} ${p2}`;
      }).trim();
    }
  },
  methods: {
    onInput(event) {
      const rawValue = event.target.value.replace(/\D/g, ''); // only numbers
      this.$emit('update:modelValue', rawValue);
    },
    updateValue(event) {
      console.log(event.target.value);
      this.$emit('update:modelValue', event.target.value);
    },
    validate() {
      if (!this.modelValue.trim()) {
        this.error = 'Tel is required.';
        return false;
      }
      this.error = '';
      return true;
    },
  },
};
</script>
