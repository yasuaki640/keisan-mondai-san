<template>
  <div>
    <h1 v-if="error.statusCode === 404">ページが存在しません。</h1>
    <h1 v-else-if="error.statusCode === 401 || error.statusCode === 403">
      ログインし直してください。
    </h1>
    <h1 v-else>
      予期せぬエラーが発生しました。大変申し訳ありませんがもう一度操作をお試しください。
    </h1>
    <a @click="redirect">戻る</a>
  </div>
</template>

<script>
import {
  HTTP_STATUS_FORBIDDEN,
  HTTP_STATUS_NOT_FOUND,
  HTTP_STATUS_UNAUTHORIZED,
} from '~/constants/http'

export default {
  layout: 'error',
  props: {
    error: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      message: '',
    }
  },
  computed: {},
  async created() {
    if (
      this.error.status === HTTP_STATUS_UNAUTHORIZED ||
      this.error.status === HTTP_STATUS_FORBIDDEN
    ) {
      await this.$auth.logout
    }
  },
  mounted() {
    this.getMessageByStatusCode(this.error.statusCode)
  },
  methods: {
    redirect() {
      return this.$route.name === 'index'
        ? this.$router.go(0)
        : this.$router.push('/')
    },
    getMessageByStatusCode(statusCode) {
      if (statusCode === HTTP_STATUS_NOT_FOUND) {
        return 'ページが存在しません。'
      } else if (
        statusCode === HTTP_STATUS_UNAUTHORIZED ||
        statusCode === HTTP_STATUS_FORBIDDEN
      ) {
        return 'ログインし直してください。'
      } else {
        return '予期せぬエラーが発生しました。大変申し訳ありませんがもう一度操作をお試しください。'
      }
    },
  },
}
</script>
