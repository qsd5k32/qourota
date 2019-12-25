<template>
  <v-app dark>
    <v-navigation-drawer v-model="drawer" clipped :right="$vuetify.rtl" fixed app>
      <v-list>
        <v-list-item
          v-for="item in drawerList"
          nuxt
          :to="item.to"
          exact
        >
          <v-list-item-action>
            <v-icon>mdi-link</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title> {{ $t(item.name) }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar color="cyan" dark :clipped-right="$vuetify.rtl" :clipped-left="!$vuetify.rtl" fixed app>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" tag="a" />
      <v-toolbar-title v-text="title" class="d-none d-lg-flex" />
      <v-spacer />
      <ChangeLang />
      <ProfileMenu />
    </v-app-bar>
    <v-content>
      <v-container>
        <nuxt />
      </v-container>
    </v-content>
    <v-footer app>
      <span>&copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
import ProfileMenu from "../components/ProfileMenu";
import ChangeLang from "../components/ChangeLang";
export default {
  components: {
    ProfileMenu,ChangeLang
  },
  data() {
    return {
      drawer: false,
      drawerList: [
        {
          name: 'auth.login',
          to: '/auth/login',
          icon: 'mdi-account'
        },
        {
          name: 'auth.register',
          to: '/auth/register',
          icon: 'mdi-account'
        },
      ],
      title: 'ouedkniss',
    }
  },
  mounted() {

  },
  methods: {

  }
}
</script>
