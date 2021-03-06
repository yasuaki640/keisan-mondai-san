# 挫折した計算問題の襲来

[![yasuaki640](https://circleci.com/gh/yasuaki640/keisan-mondai-san.svg?style=svg)](https://app.circleci.com/pipelines/github/yasuaki640/keisan-mondai-san)

## 概要

小中学生レベルの計算問題を練習できるアプリ。  
コロナ禍の影響を受けない学習の機会を提供する。

## 機能

- 計算問題機能
    - 足し算引き算等の四則演算を出題する。
    - 桁数、繰り上がりの有無、小数点などの計算の難易度を指定できる。
    - 指定の問題数を解き終わったら成績を表示する。
    - 問題数と解答時間を記録する。

- 問題出力機能
    - 任意の計算問題をPDF形式で出力できる。

- ログイン機能
    - ユーザーのemail, password, username, 生年月日を入力し登録する。
    - ユーザーのemail, passwordを入力しログインできる。
    - 他のSNSと連携し登録ができる。
    - ユーザーがマイページを公開したくなければ非ログインユーザーがマイページを見れなくする。


- 成績表示機能
    - 自分の成績やほかのユーザーの順位などを見ることができる。
    - ダッシュボード形式で自分の成績を閲覧できる。
    - 可能であれば直近の成績をグラフ表示する。


- ユーザー情報表示機能
    - ユーザーの情報をマイページで確認できる。
    - ユーザーのプロフィール画像を登録し表示できる。

## 構成技術

### Application

- PHP 8系
- Laravel 8系
- Vue 2系
- Mysql

### Infra

- Docker
- Vagrant (for local dev only)
- AWS
