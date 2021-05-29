<template>
  <section>
    <h1 class="title">計算問題さん</h1>
    <h4 class="subtitle is-6 has-text-grey">
      このアプリは小学生から中学生が対象の、四則演算を練習できるアプリです。
    </h4>

    <p class="subtitle is-7">* は入力必須です。</p>

    <b-field label="お名前 *">
      <b-input></b-input>
    </b-field>

    <b-field label="メール" message="8文字以上  半角英数字">
      <b-input type="email" maxlength="30"></b-input>
    </b-field>

    <b-field label="パスワード *">
      <b-input type="password"></b-input>
    </b-field>

    <b-button type="is-primary">登録</b-button>
  </section>
</template>

<script>
export default {
  name: 'HomePage',
}
</script>
