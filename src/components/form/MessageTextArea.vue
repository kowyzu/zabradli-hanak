<template>
  <div>
    <textarea :class="['form-control', { 'form-error-input': error }]" :id="id" rows="4" :placeholder="placeholder"
      :value="modelValue" @input="updateValue" @change="validate"></textarea>
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
  methods: {
    updateValue(event) {
      this.$emit('update:modelValue', event.target.value);
    },
    validate() {
      if (!this.modelValue.trim()) {
        this.error = 'Zadejte zprávu.';
        this.$emit('error', this.error);
        return false;
      }
      this.error = null;
      this.$emit('error', null);
      return true;
    },
  },
};
</script>
