<template>
  <ValidationProvider
    v-slot="{ errors }"
    :vid="vid"
    :name="$attrs.label"
    :rules="rules"
  >
    <div class="block">
      <slot />
      <p class="has-text-danger">{{ errors[0] }}</p>
    </div>
  </ValidationProvider>
</template>

<script>
export default {
  props: {
    vid: {
      type: String,
    },
    rules: {
      type: [Object, String],
      default: '',
    },
  },
}
</script>
