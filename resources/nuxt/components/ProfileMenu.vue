<template>
  <v-menu
    :nudge-width="200"
    offset-x
    v-if="$auth.loggedIn"
  >
    <template v-slot:activator="{ on }">
      <v-btn
        icon
        v-on="on"
      >
        <v-avatar
          color="color"
        >
          <v-img :alt="user.name" :src="'/storage/' + user.avatar"/>
        </v-avatar>
      </v-btn>
    </template>

    <v-card>
      <v-list>
        <v-list-item>
          <v-list-item-avatar>
            <v-img :alt="user.name" :src="'/storage/' + user.avatar"/>
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title>{{ user.name }}</v-list-item-title>
            <v-list-item-subtitle>{{ $t('app.amazing.client') }}</v-list-item-subtitle>
          </v-list-item-content>

          <v-list-item-action>
            <v-btn href="#" icon>
              <v-icon>mdi-settings</v-icon>
            </v-btn>
          </v-list-item-action>
        </v-list-item>

        <v-divider/>

        <v-list-item href="#" link>
          <v-list-item-icon>
            <v-icon>mdi-security</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Change password</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
      <v-card-actions>
        <v-spacer/>
        <v-btn @click="logout()" color="red" dark text>
          <v-icon>mdi-power</v-icon>
          logout
        </v-btn>
        <v-spacer/>
      </v-card-actions>
    </v-card>
  </v-menu>
</template>

<script>
  export default {
    name: "ProfileMenu",
    data() {
      return {
        loggedIn: false,
        user: {},
      }
    },
    mounted() {
      this.loggedIn = this.$auth.loggedIn;
      this.user = this.$auth.user;
    },
    methods: {
      logout() {
        this.$auth.logout();
        this.$router.push('/auth/login')
      }
    }
  }
</script>

<style scoped>

</style>
