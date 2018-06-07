<template>
  <el-col :span="12">
    <el-card>
      <img :src="image.filename.replace('public', '/storage')" width="100%">
      <div>
        コメント：{{image.comment}}<br>
        作成日：{{image.created_at}}<br>
        更新日：{{image.updated_at}}<br>
        <div>
          <el-button type="info" v-if="!commentEditing" @click="commentEditing=true">
            編集
          </el-button>
          <template v-else>
            <input ref="comment" type="text"><br>
            <el-button type="submit" @click="editComment">
              変更確定
            </el-button>
          </template>
        </div>
        <el-button type="danger" @click="$emit('delete')">削除</el-button>
      </div>
    </el-card>
  </el-col >
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