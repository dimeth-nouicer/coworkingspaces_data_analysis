<template>
  <v-container fluid>
     
        <v-parallax :src="require('../assets/saerch2.jpg')" height="600">
            <v-toolbar>
              
              <v-layout row>
                      <v-flex xs12 sm6 offset-sm3>
                          <v-text-field 
                          name="search"
                          label="Search Coworking space"
                          id="name"
                          v-model="search">

                          </v-text-field>
                      </v-flex>
                  </v-layout>

                <v-btn color="primary">Search</v-btn>

              
            </v-toolbar>
        </v-parallax>

        <iframe width="100%" height="520" frameborder="0" src="https://mohamedaziznajjar.carto.com/builder/725ac097-0be2-4155-9a5d-a95a87247736/embed" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>

        <section>  
        <v-layout
          column
          wrap
          class="my-5"
          align-center
        >
          <v-flex xs12 sm4 class="my-3">
            <div class="text-xs-center">
              <h2 class="headline">Discover more CoWorking Spaces</h2>
            </div>
          </v-flex>
          <v-flex xs12>
            <v-container grid-list-xl>
              <v-layout row wrap align-center>
                <v-flex xs12 md4>
                  <v-card flat class="transparent">
                    <v-card-text class="text-xs-center">
                      <!-- <v-icon x-large class="blue--text text--lighten-2">color_lens</v-icon> -->
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                      <div class="headline text-xs-center">El Space</div>
                    </v-card-title>
                    <v-card-text v-model="item.body" >
                      This is the first social coworking space in Tunis, 
                      and we work hard to push everyday our skills to make this country and the world better.
                       And we need each of you to be a part of this adventure.
                    </v-card-text>
                  </v-card>
                </v-flex>
                <v-flex xs12 md4>
                  <v-card flat class="transparent">
                    <v-card-text class="text-xs-center">
                      <!-- <v-icon x-large class="blue--text text--lighten-2">flash_on</v-icon> -->
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                      <div class="headline">Cogite</div>
                    </v-card-title>
                    <v-card-text>
                      Looking for a shared space to work in and at the same time actively contribute to a sustainable development in Tunisia? 
                      Well at Cogite you can do exactly just that…and more of course. Great for impact driven individuals and entrepreneurs,
                       Cogite is a collaborative work space with a true sense of community.
                    </v-card-text>
                  </v-card>
                </v-flex>
                <v-flex xs12 md4>
                  <v-card flat class="transparent">
                    <v-card-text class="text-xs-center">
                      <!-- <v-icon x-large class="blue--text text--lighten-2">build</v-icon> -->
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                      <div class="headline text-xs-center">Cothink</div>
                    </v-card-title>
                    <v-card-text>
                      111-CoThink offers a collaborative, user-friendly and shared workspace with a lot of flexibility in terms of membership.
                      111-CoThink is a network of influential entrepreneurs; motivated entrepreneurs who are promoting entrepreneurship in Tunisia.
                      #CoThinkers are a community that cultivates Sharing, facilitating exchanges, cooperation and personal and professional development.
                    </v-card-text>
                  </v-card>
                </v-flex>
              </v-layout>
            </v-container>
          </v-flex>
        </v-layout>
      </section>
      
  </v-container>
</template>

<script>
import VueFrame from 'vue-frame'
export default {
    data(){
            return{
                item: []
            }
        },
    created: function(){
            this.getItem();
        },
    mounted() {
      axios.get("/storys")
      .then(response => {this.item = response.data.results})
    },
    /* methods: {
             getItem()
            {
              let uri = `http://127.0.0.1:8000/stories/${this.$route.params.id}/edit`;
                this.axios.get(uri).then((response) => {
                    this.item = response.data;
                });
            }, 
            getItem(){
              axios.get('/stories')
                    .then(function (response) {
                    console.log(response);
                    })
                    .catch(function (error) {
                    console.log(error);
                    });
            }

             updateItem()
            {
              let uri = 'http://localhost:8000/items/'+this.$route.params.id;
                this.axios.patch(uri, this.item).then((response) => {
                  this.$router.push({name: 'DisplayItem'});
                });
            } 
        }  */   
}
</script>
