<template>
  <tr>
    <td><img :src="image.filename.replace('public', '/storage')" height="40%"></td>
    <td>{{image.comment}}</td>
    <td>{{image.created_at}}</td>
    <td>{{image.updated_at}}</td>
    <td>
      <a v-if="!commentEditing" @click="commentEditing=true">編集</a>
      <template v-else>
        <input ref="comment" type="text"><br>
        <button @click="editComment">変更確定</button>
      </template>
    </td>
    <td>
      <button @click="$emit('delete')">削除</button>
    </td>
  </tr>
</template>
<script>
  export default {
    props: [
      'image'
    ],
    data() {
      return {
        commentEditing: false
      }
    },
    methods: {
      editComment() {
        this.$emit('edit', {id: this.image.id, comment: this.$refs.comment.value})
        this.commentEditing=false
      }
    }
  }
</script>