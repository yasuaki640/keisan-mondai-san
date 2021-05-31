<template>
  <ValidationObserver ref="observer" v-slot="{ handleSubmit }">
    <!-- the "handleSubmit" function on the slot-scope executes the callback if validation was successfull -->
    <section class="section">
      <BInputWithValidation
        v-model="item.email"
        rules="email|required"
        type="email"
        label="メール"
      />

      <BInputWithValidation
        v-model="item.password"
        rules="required|min:8"
        type="password"
        label="パスワード"
        vid="password"
      />

      <BInputWithValidation
        v-model="item.password_confirmation"
        rules="required|min:8|confirmed:password"
        name="Password"
        type="password"
        label="パスワード (確認)"
      />

      <BInputWithValidation
        v-model="item.bod"
        rules="required"
        name="bod"
        type="date"
        label="生年月日"
      />

      <BRadioWithValidation
        v-model="item.sex"
        rules="required"
        name="性別"
        type="radio"
        label="性別"
      >
        <b-radio v-model="item.sex" native-value="male">男</b-radio>
        <b-radio v-model="item.sex" native-value="female">女</b-radio>
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
      item: {
        email: '',
        password: '',
        password_confirmation: '',
        sex: '',
        bod: '',
      },
    }
  },
  methods: {
    submit() {
      alert(JSON.stringify(this.item))
    },
    resetForm() {
      this.email = ''
      this.password = ''
      this.password_confirmation = ''
      this.sex = ''
      this.bod = ''
      requestAnimationFrame(() => {
        this.$refs.observer.reset()
      })
    },
  },
}
</script>
