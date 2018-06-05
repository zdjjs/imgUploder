<template>
  <div>
    <h2>アップロード画像一覧</h2>
    <table>
      <tr>
        <th>画像</th>
        <th>コメント</th>
        <th>投稿日</th>
        <th>更新日</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
      <tr v-for="image in images">
        <td><img :src="image.filename" height="40%"></td>
        <td>{{image.comment}}</td>
        <td>{{image.created_at}}</td>
        <td>{{image.updated_at}}</td>
        <td><a>編集</a></td>
        <td>
          <button type="submit">削除</button>
        </td>
      </tr>
    </table>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        images: []
      }
    },
    mounted() {
      axios('/api/').then((response) => {
        this.images = response.data
      })
    }
  }
</script>