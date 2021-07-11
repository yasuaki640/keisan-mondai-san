<template>
  <ValidationObserver ref="observer" v-slot="{ handleSubmit }">
    <section class="section">
      <BInputWithValidation
        v-model="item.name"
        rules="required"
        type="text"
        label="ユーザーID *"
      />

      <BInputWithValidation
        v-model="item.password"
        rules="required"
        type="password"
        label="パスワード *"
        vid="password"
      />

      <div class="buttons">
        <button class="button is-success" @click="handleSubmit(login)">
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
import { HTTP_STATUS_UNAUTHORIZED } from '~/constants/http'

export default {
  name: 'LoginForm',
  components: {
    BInputWithValidation,
  },
  data() {
    return {
      item: {
        name: '',
        password: '',
      },
    }
  },
  methods: {
    async login() {
      await this.$auth
        .loginWith('laravelJWT', {
          data: {
            name: this.item.name,
            password: this.item.password,
          },
        })
        .then(() => {
          this.$services.message.showSuccessMessage('ログインしました。')
          this.$router.push('/home')
        })
        .catch((e) => {
          if (e.response.status === HTTP_STATUS_UNAUTHORIZED) {
            this.$services.message.showErrorMessage(
              'ユーザーIDまたはパスワードが間違っています。'
            )
          }
        })
    },
    resetForm() {
      this.name = ''
      this.password = ''
      requestAnimationFrame(() => {
        this.$refs.observer.reset()
      })
    },
  },
}
</script>
