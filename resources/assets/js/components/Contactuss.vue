<template>
  <v-container>
      <v-layout row>
          <v-flex xs12 sm6 offset-sm3>
              <h2>Send us your feedback</h2>
          </v-flex>
      </v-layout>

      <v-layout row>
          <v-flex xs12>
              <form @submit.prevent="onSubmitted">
                  <v-layout row>
                      <v-flex xs12 sm6 offset-sm3>
                          <v-text-field 
                          name="name"
                          label="Name"
                          id="name"
                          v-model="name"
                          required>

                          </v-text-field>
                      </v-flex>
                  </v-layout>

                  <v-layout row>
                      <v-flex xs12 sm6 offset-sm3>
                          <v-text-field 
                          name="email"
                          label="Email"
                          id="mail"
                          v-model="mail"
                          required>

                          </v-text-field>
                      </v-flex>
                  </v-layout>

                  <v-layout row>
                      <v-flex xs12 sm6 offset-sm3>
                          <v-text-field 
                          name="feedback"
                          label="your feedback"
                          id="feedback"
                          v-model="subject"
                          required
                          multi-line>

                          </v-text-field>
                      </v-flex>
                  </v-layout>
                  
                  <v-layout row>
                      <v-flex class="text-xs-center" mt-5>
                          <v-btn class="primary" type="submit" >Send</v-btn>
                      </v-flex>
                  </v-layout>
              </form>
          </v-flex>
      </v-layout>
  </v-container>
</template>

<script>
export default {
  data(){
      return{
        name: '',
        mail: '',
        subject: '',
        done: false
      }
  },
  methods: {
    onSubmitted(){
        alert("shit");
      this.axios.post('/contact',{messege:this.name,email:this.mail,subject:this.subject})
      .then(alert("done"))
    }
  }
}
</script>
