<template>
  <div>
    <nav
      class="navbar header has-shadow is-primary"
      role="navigation"
      aria-label="main navigation"
    >
      <div class="navbar-brand">
        <a class="navbar-item" href="/">
          <img src="~assets/buefy.png" alt="Buefy" height="28" />
        </a>

        <div class="navbar-burger">
          <span />
          <span />
          <span />
        </div>
      </div>
    </nav>

    <section class="main-content columns">
      <aside class="column is-2 section">
        <p class="menu-label is-hidden-touch">General</p>
        <ul class="menu-list">
          <template v-for="(item, key) of items">
            <li v-if="isDisplayed(item.requireLogin)" :key="key">
              <nuxt-link :to="item.to" exact-active-class="is-active">
                <b-icon :icon="item.icon" />
                {{ item.title }}
              </nuxt-link>
            </li>
          </template>
        </ul>
      </aside>

      <div class="container column is-10">
        <nuxt />
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          title: 'トップページ',
          icon: 'home',
          to: { name: 'index' },
          requireLogin: false,
        },
        {
          title: 'ユーザーメイン画面',
          icon: 'account',
          to: { name: 'home' },
          requireLogin: true,
        },
        {
          title: '計算問題',
          icon: 'lightbulb',
          to: { name: 'question-select' },
          requireLogin: true,
        },
      ],
    }
  },
  computed: {
    isDisplayed() {
      return function (requireLogin) {
        return !requireLogin || this.$auth.loggedIn
      }
    },
  },
}
</script>
