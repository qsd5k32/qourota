<template>
  <v-row align="center" justify="center">
    <v-col cols="12" md="6" sm="8">
      <h4 class="display-2 text-center font-weight-black">Login form</h4>

      <v-card class="pa-4">
        <v-card-text>
          <v-form lazy-validation v-model="valid">
            <v-text-field
              :label="$t('auth.email')"
              :rules="[
                (v) => !!v || $t('validation.required'),
                (v) => /.+@.+\..+/.test(v) || $t('validation.email')
              ]"
              color="primary"
              prepend-icon="mdi-at"
              required
              type="email"
              v-model="fields.username"
            />
            <v-text-field
              :label="$t('auth.password')"
              :rules="[(v) => !!v || $t('validation.required')]"
              color="primary"
              id="password"
              prepend-icon="mdi-lock"
              type="password"
              v-model="fields.password"
            />
            <v-checkbox color="primary" :label="$t('auth.remember')" />
            <v-layout>
              <v-btn tag="a" text>{{ $t('auth.forgot') }}</v-btn>
              <v-spacer />
              <v-btn :disabled="!valid" @click="login()" :loading="loading" color="primary" class="white--text">{{
                $t('auth.login')
                }}
              </v-btn>
            </v-layout>
          </v-form>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
  export default {
    name: 'Login',
    middleware: 'guest',
    title: 'login',
    data() {
      return {
        loading: false,
        valid: false,
        fields: {
          username: '',
          password: '',
          grant_type: 'password',
          client_id: '2',
          client_secret: '34jBFgud7U44uKyiYcO2eS1iFb0sq61lVdxkY3b5'
        }
      }
    },
    methods: {
      async login() {
        try {
          this.$auth
            .loginWith('local', {
              data: this.fields
            })
            .then(() => {
              this.$router.push('/')
            }).finally(() => {

          });
        } catch (e) {
          this.$router.push('/login')
        }

      }
    }
  }
</script>

<style scoped></style>
