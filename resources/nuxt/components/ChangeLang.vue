<template>
  <v-menu offset-y>
    <template v-slot:activator="{ on }">
      <v-btn
        color="primary"
        dark
        v-on="on"
      >
        Dropdown
      </v-btn>
    </template>
    <v-list>
      <v-list-item
        v-for="locale in $i18n.locales"
        @click="switchLang(locale.code)"
      >
        <v-list-item-title>{{ locale.name }}</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-menu>
</template>

<script>
    export default {
        name: "ChangeLang",
        mounted() {
          this.rtl();
        },
      methods: {
          rtl()
          {
            this.$vuetify.rtl = this.$i18n.locale === 'ar';
          },
          switchLang(locale)
          {
            this.$i18n.setLocaleCookie(locale);
            this.$vuetify.rtl = locale === 'ar';
            this.$router.replace(this.switchLocalePath(locale))
          }
      }
    }
</script>

<style scoped>

</style>
