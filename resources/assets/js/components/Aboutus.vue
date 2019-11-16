<template>
  
</template>
<script>
export default {
  data(){
      return{
        results: []
      }
  },
  methods: {
    getaboutus(){
       // alert("shit");
      this.axios.gett('/about').then(response => {this.results = response.data.results})
    }
  }
}
</script>
