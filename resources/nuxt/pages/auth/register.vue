<template>
  <v-container>
    <v-row align="center" justify="center">
      <v-col cols="12" sm="8" md="6">
        <h1 class="display-2 text-center font-weight-black" />

        <v-card>
          <v-card-text>
            <v-form v-model="valid" lazy-validation>
              <v-text-field
                v-model="fields.email"
                :label="$t('auth.email')"
                :rules="[
                (v) => !!v || $t('validation.required'),
                (v) => /.+@.+\..+/.test(v) || $t('validation.email')
              ]"
                v-validate="'required'"
                color="primary"
                prepend-icon="mdi-at"
                type="email"
                required
              />
              <v-text-field
                v-model="fields.name"
                :rules="[(v) => !!v || $t('validation.required')]"
                :label="$t('auth.name')"
                color="primary"
                prepend-icon="mdi-account"
              />
              <v-text-field
                v-model="fields.password"
                :rules="[(v) => !!v || $t('validation.required')]"
                :label="$t('auth.password')"
                color="primary"
                prepend-icon="mdi-lock"
                type="password"
              />

              <v-text-field
                v-model="fields.password_confirmation"
                :rules="[(v) => !!v || $t('validation.required') , (v) => (this.fields.password === this.fields.password_confirmation) || $t('validation.confirm_password')]"
                :label="$t('auth.confirm_password')"
                color="primary"
                prepend-icon="mdi-lock"
                type="password"
              />

              <v-btn :disabled="!valid" @click="register()" block :loading="loading" color="primary" class="white--text">{{
                $t('auth.register')
                }}</v-btn>
            </v-form>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: 'Register',
  middleware: 'guest',
  data(){
    return {
      loading: false,
      valid: false,
      fields : {
        email: '',
        name: '',
        password: '',
        password_confirmation: '',
        grant_type: 'password',
        client_id: '2',
        client_secret: '34jBFgud7U44uKyiYcO2eS1iFb0sq61lVdxkY3b5'
      }
    }
  },
  methods: {
    register()
    {
      this.$axios.post('api/register',this.fields)
        .then(response => {

          try {
            this.$auth
              .loginWith('local', {
                data: {
                  username: this.fields.email,
                  password: this.fields.password,
                  grant_type: 'password',
                  client_id: '2',
                  client_secret: '34jBFgud7U44uKyiYcO2eS1iFb0sq61lVdxkY3b5'
                }
              })
              .then(() => {
                this.$router.push('/')
              }).finally(() => {

            });
          } catch (e) {
            this.$router.push('/login')
          }
      }).catch(res => {
        console.log(res)
      })
    }
  },
}
</script>

<style scoped>

</style>
