<template>
  <section>
    <h1 class="title">計算問題さん</h1>
    <h4 class="subtitle is-6 has-text-grey">
      このアプリは小学生から中学生が対象の、四則演算を練習できるアプリです。
    </h4>
    <RegisterForm></RegisterForm>
  </section>
</template>

<script>
import RegisterForm from '~/components/RegisterForm'

export default {
  name: 'Index',
  comments: {
    RegisterForm,
  },
  data() {
    return {
      item: {
        name: '',
        email: '',
        password: '',
      },
    }
  },

  methods: {},
}
</script>
