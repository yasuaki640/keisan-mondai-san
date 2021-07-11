<template>
  <section class="section">
    <h2 class="title is-3 has-text-grey">問題種別設定画面</h2>

    <BSelectWithValidation rules="required" label="演算子">
      <option value>選択してください</option>
      <option value="add">足し算</option>
    </BSelectWithValidation>

    <BRadioWithValidation
      rules="required"
      name="num_of_questions"
      type="radio"
      label="問題数"
    >
      <b-radio native-value="10">10問</b-radio>
      <b-radio native-value="20">20問</b-radio>
      <b-radio native-value="30">30問</b-radio>
      <b-radio native-value="50">50問</b-radio>
    </BRadioWithValidation>

    <nuxt-link to="/login">
      <b-button type="is-primary">回答開始</b-button>
    </nuxt-link>
  </section>
</template>
<script>
import BSelectWithValidation from '~/components/inputs/BSelectWithValidation'
import BRadioWithValidation from '~/components/inputs/BRadioWithValidation'

export default {
  components: {
    BSelectWithValidation,
    BRadioWithValidation,
  },
  middleware: 'auth',
}
</script>
