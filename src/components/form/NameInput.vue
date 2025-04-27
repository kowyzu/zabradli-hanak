<template>
  <div>
    <div class="input-group">
      <div class="input-group-text"><i class="fa-solid fa-user fa-fw"></i></div>
      <input type="text" :class="['form-control', { 'form-error-input': error }]" :id="id" name="name"
        :placeholder="placeholder" :value="modelValue" @input="updateValue" @change="validate">
    </div>
    <div v-if="error" class="form-error-msg">
      Zadejte své jméno.
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
        this.error = 'Name is required.';
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
