<template>
  <div>
    <h1 v-if="error.statusCode === 404">ページが存在しません。</h1>
    <h1 v-if="error.statusCode === 401 || error.statusCode === 403">
      ログインし直してください。
    </h1>
    <h1 v-else>
      予期せぬエラーが発生しました。大変申し訳ありませんがもう一度操作をお試しください。
    </h1>
    <a @click="redirect">戻る</a>
  </div>
</template>

<script>
export default {
  layout: 'error',
  props: {
    error: {
      type: Object,
      required: true,
    },
  },
  async created() {
    if (this.status === 401) {
      await this.$auth.logout
    }
  },
  methods: {
    redirect() {
      return this.$route.name === 'index'
        ? this.$router.go()
        : this.$router.push('/')
    },
  },
}
</script>
