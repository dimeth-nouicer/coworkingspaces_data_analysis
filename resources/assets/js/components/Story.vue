<template>
    <v-container>
      <v-layout>
          <v-flex xs12 sm6 offset-sm3>
              <h2>Add your Story</h2>
          </v-flex>
      </v-layout>

      <v-layout>
          <v-flex xs12>
              <form @submit.prevent="onSubmitted">
                  <v-layout row>
                      <v-flex xs12 sm6 offset-sm3>
                          <v-text-field 
                          name="title"
                          label="Title"
                          id="tile"
                          v-model="title"
                          required>

                          </v-text-field>
                      </v-flex>
                  </v-layout>

                  <v-layout row>
                      <v-flex xs12 sm6 offset-sm3>
                          <v-text-field 
                          name="story"
                          label="your Story"
                          id="story"
                          v-model="story"
                          required
                          multi-line>

                          </v-text-field>
                      </v-flex>
                  </v-layout>
                  
                  <v-layout row>
                      <v-flex class="text-xs-center" mt-5>
                          <v-btn class="primary" type="submit" >Add</v-btn>
                      </v-flex>
                  </v-layout>
              </form>
          </v-flex>
      </v-layout>
  </v-container>
</template>
<script>
import axios from 'axios';

export default {
  data(){
    return {
      title: '',
      story: ''
    }
  },
  methods: {
    onSubmitted(){
      this.axios.post('/story',{title:this.title,story:this.story}
      ).then(function(response){
        alert("added");
      }
      .bind(this)).catch(function(){alert("wrong")})  
       }
  }
}
</script>
