<template>
  <div id="app">
    <button @click="handleSavingContent">save</button>
    <vue-editor v-model="content"></vue-editor>
  </div>
</template>
 
<script>
  import { VueEditor } from 'vue2-editor'
 
  export default {
    components: {
      VueEditor
    },
 
    data () {
      return {
        content: '<h3>Initial Content</h3>'
      }
    },
    mounted () {
        this.getData()
    },
    methods: {
        getData(){
            axios.get('/api/getData')
            .then(response => {
                console.log(response.data, 'asdfasd')
                this.content = response.data.data.editor_data
                console.log(this.content)
            })
        },
      handleSavingContent() {
        // You have the content to save
        console.log(this.content)
        axios.post('/api/save', {
            editor_data: this.content
        })
        .then (response => {
            console.log(response.data)
        })
        .catch (errorRespnse => {
            console.log(errorRespnse)
        })
      }
    }  
  }
</script> 