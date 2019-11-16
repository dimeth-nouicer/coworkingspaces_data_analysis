<template>
    <div>
    <v-layout>
    <v-flex xs12 sm6 offset-sm3>
      <v-card v-for="result in results" :key="result.id">
        <!-- <v-card-media
          class="white--text"
          height="200px"
          src="/static/doc-images/cards/docks.jpg"
        > -->
          <!-- v-container fill-height fluid>
            <v-layout fill-height>
              <v-flex xs12 align-end flexbox>
                <span class="headline">Stories</span>
              </v-flex>
            </v-layout>
          </v-container> -->
        <!-- </v-card-media> -->
        <v-card-title>
          <div>
            <span class="grey--text">{{result.title}}</span><br>
            
          </div>

        </v-card-title>
        <span> {{result.body}} </span><br>
        <v-card-actions>
          <v-btn flat color="orange">Share</v-btn>
          <router-link :to="'/read/'+result.id" > <v-btn flat color="orange">Explore</v-btn></router-link>
         
        </v-card-actions>
      </v-card>
    </v-flex>
  </v-layout>
</div>
</template>
<script>
export default {
    data(){
    return {
      results : []
    }
  },
  mounted() {
    axios.get("/story")
    .then(response => {console.log(response.data); this.results = response.data})
  }
}
</script>
