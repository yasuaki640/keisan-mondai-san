<template>
  <ValidationObserver ref="observer" v-slot="{ handleSubmit }">
    <section class="section">
      <BInputWithValidation
        v-model="item.name"
        rules="required|max:255"
        type="text"
        label="ユーザーID"
      />

      <BInputWithValidation
        v-model="item.email"
        rules="email"
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
        v-model="item.d_o_b"
        rules="required"
        name="d_o_b"
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
        <b-radio v-model="item.sex" native-value="0">男</b-radio>
        <b-radio v-model="item.sex" native-value="1">女</b-radio>
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
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        sex: '',
        d_o_b: '',
      },
    }
  },
  methods: {
    async submit() {
      await this.$axios.$post('/users', {
        name: this.item.name,
        email: this.item.email,
        password: this.item.password,
        password_confirmation: this.item.password_confirmation,
        sex: this.item.sex,
        d_o_b: this.item.d_o_b,
      })

      this.$services.message.showSuccessMessage('登録しました。')
      await this.$router.push('/login')
    },
    resetForm() {
      this.email = ''
      this.password = ''
      this.password_confirmation = ''
      this.sex = ''
      this.d_o_b = ''
      requestAnimationFrame(() => {
        this.$refs.observer.reset()
      })
    },
  },
}
</script>
