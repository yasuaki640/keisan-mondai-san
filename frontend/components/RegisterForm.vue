<template>
  <ValidationObserver ref="observer" v-slot="{ handleSubmit }">
    <!-- the "handleSubmit" function on the slot-scope executes the callback if validation was successfull -->
    <section class="section">
      <BInputWithValidation
        v-model="email"
        rules="email"
        type="email"
        label="メール"
      />

      <BInputWithValidation
        v-model="password"
        rules="required"
        type="password"
        label="パスワード *"
        vid="password"
      />

      <BInputWithValidation
        v-model="confirmation"
        rules="required|confirmed:password"
        name="Password"
        type="password"
        label="パスワード (確認)"
      />

      <BRadioWithValidation
        v-model="confirmation"
        rules="required"
        name="性別"
        type="radio"
        label="性別"
      >
        <b-radio v-model="choices" native-value="male">男</b-radio>
        <b-radio v-model="choices" native-value="female">女</b-radio>
      </BRadioWithValidation>

      <div class="buttons">
        <button class="button is-success" @click="handleSubmit(submit)">
          <span class="icon is-small">
            <i class="fas fa-check"></i>
          </span>
          <span>Submit</span>
        </button>

        <button class="button" @click="resetForm">
          <span class="icon is-small">
            <i class="fas fa-redo"></i>
          </span>
          <span>Reset</span>
        </button>
      </div>
    </section>
  </ValidationObserver>
</template>

<script>
import BInputWithValidation from './inputs/BInputWithValidation'
import BRadioWithValidation from '~/components/inputs/BRadioWithValidation'

export default {
  name: 'BuefyForm',
  components: {
    BInputWithValidation,
    BRadioWithValidation,
  },
  data() {
    return {
      email: '',
      password: '',
      confirmation: '',
      subject: '',
      choices: [],
    }
  },
  methods: {
    submit() {
      alert('Form submitted yay!')
    },
    resetForm() {
      this.email = ''
      this.password = ''
      this.confirmation = ''
      this.subject = ''
      this.choices = []
      requestAnimationFrame(() => {
        this.$refs.observer.reset()
      })
    },
  },
}
</script>
