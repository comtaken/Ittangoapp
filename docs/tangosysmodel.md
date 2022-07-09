## 概要

![IT単語帳モデル図](./tangosysmodel.svg)

## テーブル説明

### users

| No. | 名称       |      型       | 規定値 | 内容                             |
| --: | :--------- | :-----------: | :----: | -------------------------------- |
|   1 | id         |    bigint     |        | ユーザーの ID を設定する。       |
|   2 | name       | varchara(255) |        | ユーザーの名前を設定する。       |
|   3 | email      | varchara(255) |        | ユーザーの Email を設定する。    |
|   4 | password   | varchara(255) |        | ユーザーのパスワードを設定する。 |
|   5 | created_at |   timestamp   |        | 作成日を設定する。               |
|   6 | updated_at |   timestamp   |        | 更新日を設定する。               |

### ittangos

| No. | 名称       |      型       | 規定値 | 内容                        |
| --: | :--------- | :-----------: | :----: | --------------------------- |
|   1 | id         |    bigint     |        | 単語の ID を設定する。      |
|   2 | tango      | varchara(255) |        | 単語を設定する。            |
|   3 | setumei    | varchara(255) |        | 単語の説明を設定する。      |
|   4 | sankoukizi | varchara(255) |        | 参考記事の URL を設定する。 |
|   5 | created_at |   timestamp   |        | 作成日を設定する。          |
|   6 | updated_at |   timestamp   |        | 更新日を設定する。          |
