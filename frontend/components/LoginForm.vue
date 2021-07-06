<template>
  <ValidationObserver ref="observer" v-slot="{ handleSubmit }">
    <!-- the "handleSubmit" function on the slot-scope executes the callback if validation was successfull -->
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

export default {
  name: 'BuefyForm',
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
      const response = await this.$store.dispatch('login', this.item)

      alert(JSON.stringify(response))

      this.$services.message.showSuccessMessage('ログインしました。')
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
