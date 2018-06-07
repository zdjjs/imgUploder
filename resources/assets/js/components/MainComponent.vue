<template>
  <div>
    <h1>画像アップローダー</h1>
    <h2>画像をアップロードする</h2>
    <el-upload
    ref="upload"
    action=""
    :limit="1"
    :auto-upload="false">
      <el-button slot="trigger" size="small" type="primary">
        クリックしてファイルをアップロード
      </el-button>
    </el-upload><br>
    コメント<el-input v-model="comment"/><br>
    <el-button type="success" @click="uploadImage">アップロード</el-button>
    <h2>アップロード画像一覧</h2>
    <el-row>
      <image-component
      v-for="image in images"
      :key="image.id"
      :image="image"
      @delete="deleteImage(image.id)"
      @edit="editComment"/>
    </el-row>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        images: [],
        fileList: [],
        comment: ''
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
        formData.append('file', this.$refs.upload.uploadFiles[0].raw)
        this.$refs.upload.clearFiles()
        formData.append('comment', this.comment)
        axios.post('/api/', formData).then((response) => {
          this.images.push(response.data)
        })
      },
      editComment({id, comment}) {
        axios.put(`/api/${id}`, {comment}).then((response) => {
          let index = this.images.findIndex((image) => image.id === id)
          this.$set(this.images, index, response.data)
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