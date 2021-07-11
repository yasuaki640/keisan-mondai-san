<template>
  <section class="section">
    <h2 class="title is-3 has-text-grey">解答入力画面</h2>
    <BSelectWithValidation v-model="subject" rules="required" label="演算子">
      <option value>選択してください</option>
      <option value="add">足し算</option>
    </BSelectWithValidation>
  </section>
</template>
<script>
import BSelectWithValidation from '~/components/inputs/BSelectWithValidation'

export default {
  components: {
    BSelectWithValidation,
  },
  middleware: 'auth',
}
</script>
