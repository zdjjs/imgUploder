<template>
  <div>
    <h1>画像アップローダー</h1>
    <h2>画像をアップロードする</h2>
    画像ファイル<input type="file" ref="file"><br>
    コメント<input type="text" ref="comment"><br>
    <button type="submit" @click="uploadImage">アップロード</button>
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
        <td><img :src="image.filename.replace('public', '/storage')" height="40%"></td>
        <td>{{image.comment}}</td>
        <td>{{image.created_at}}</td>
        <td>{{image.updated_at}}</td>
        <td><a>編集</a></td>
        <td>
          <button @click="deleteImage(image.id)">削除</button>
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
    },
    methods: {
      uploadImage() {
        let formData = new FormData()
        formData.append('file', this.$refs.file.files[0])
        formData.append('comment', this.$refs.comment.value)
        axios.post('/api/', formData).then((response) => {
          this.images.push(response.data)
        })
      },
      deleteImage(id) {
        axios.delete(`/api/${id}`).then((response) => {
          this.images = this.images.filter((image) => image.id !== id);
        })
      }
    }
  }
</script>