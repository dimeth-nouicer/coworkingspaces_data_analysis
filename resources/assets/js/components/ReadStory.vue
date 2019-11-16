<template>
    <v-container>
      <v-layout>
          <v-flex xs12 sm6 offset-sm3>
              <h1> {{result.title}} </h1>
          </v-flex>
       </v-layout>

       <v-layout> 
          <v-flex xs12 sm6 offset-sm3>
              <h2>{{result.body}}</h2>
          </v-flex>
       </v-layout>  

       <form @submit.prevent="onSubmitted">
                  <v-layout row>
                      <v-flex xs12 sm6 offset-sm3>
                          <v-text-field 
                          name="comment"
                          label="Add your comment"
                          id="comment"
                          v-model="comment"
                          required>

                          </v-text-field>
                      </v-flex>
                  </v-layout>

                  <v-layout row>
                      <v-flex class="text-xs-center" mt-5>
                          <v-btn class="primary" type="submit" >Send</v-btn>
                      </v-flex>
                  </v-layout>
       </form>                   
    </v-container>
</template>
<script>
export default {
    data(){
        return{
            result: {},
            comment: '',
        }
    },
    /* created: function(){
        this.fetchComments();
    },

    ready: function(){
        this.fetchComments();
    }, */
    mounted() {
    axios.get("/story/"+this.$route.params.id)
    .then(response => {console.log(response.data); this.result = response.data})
    },

   /*  methods: {
    fetchComments: function(){
      this.$http.get("../api/post/"+window.Laravel.post_id+"/comments")
        .then(function (response){
          this.comments = response.data;
      });
    },
    createComment: function(){
      this.$http.post("../api/post/"+window.Laravel.post_id+"/comment", this.comment)
        .then( function (response){
          this.comment.body= '';
          this.fetchComments();
      });
    },

    editComment: function(comment_id){
      this.$http.patch("../api/post/"+window.Laravel.post_id+"/comment/"+comment_id, this.comment)
        .then( function (response){
          this.comment.body= '';
          this.comment.id= '';
          this.fetchComments();
          this.edit = false;
      });
    },
    }, */
}
</script>
