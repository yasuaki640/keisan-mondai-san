<template>
  <section>
    <h1 class="title">ユーザーホーム画面</h1>
    <div class="columns is-desktop">
      <div v-for="(item, key) of items" :key="key" class="column">
        <Card :key="key" :title="item.title" :icon="item.icon" :to="item.to">
        </Card>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  middleware: 'auth',
  data() {
    return {
      items: [
        {
          title: '問題を解く',
          icon: 'cellphone-link',
          to: { name: 'question-solve' },
        },
        {
          title: '成績確認',
          icon: 'alert-decagram',
          to: { name: 'question-select' },
        },
        {
          title: 'プロフィール編集',
          icon: 'arrange-bring-to-front',
          to: { name: 'question-select' },
        },
      ],
    }
  },
}
</script>
