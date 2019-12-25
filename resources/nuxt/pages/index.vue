<template>
  <v-container>
    {{ $t('hello') }}
  </v-container>
</template>

<script>
export default {

  layout: 'app',
  middleware: ['auth'],
  data() {
    return {}
  },
  mounted() {

  },
  methods: {}
}
</script>
