export default {
  mode: 'spa',
  /*
   ** Headers of the page
   */
  srcDir: 'resources/nuxt',
  vue: {
    config: {
      productionTip: false,
      devtools: true,
      silent: true,
      performance: true
    }
  },
  baseURL: '',
  head: {
    titleTemplate: '%s - ' + 'qourota',
    title: 'qourota' || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content: 'Description .. ' || ''
      }
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }]
  },
  /*
   ** Customize the progress-bar color
   */
  loading: { color: '#0f6eee' },
  /*
   ** Global CSS
   */
  css: [{ src: '~/assets/app.css', lang: 'sass' }],
  /*
   ** Plugins to load before mounting the App
   */
  plugins: [],
  /*
   ** Nuxt.js dev-modules
   */
  buildModules: ['@nuxtjs/vuetify'],
  /*
   ** Nuxt.js modules
   */
  modules: [
    '@nuxtjs/axios',
    ['@nuxtjs/pwa', { icon: true, manifest: true }],
    'nuxt-i18n',
    '@nuxtjs/auth'
  ],
  i18n: {
    baseUrl: '/',
    parsePages: false,
    seo: false,
    defaultLocale: 'en',
    locales: [
      {
        name: 'العربية',
        code: 'ar',
        iso: 'ar-ar',
        file: 'ar.js'
      },
      {
        name: 'English',
        code: 'en',
        iso: 'en-US',
        file: 'en.js'
      }
    ],
    lazy: true,
    langDir: 'lang/',
    vueI18n: {
      fallbackLocale: 'en'
    },
    detectBrowserLanguage: {
      useCookie: true,
      cookieKey: 'lang',
      alwaysRedirect: true,
      fallbackLocale: 'en'
    },
    onLanguageSwitched: (previous, current) => {
      if (process.client) {
        const DATE = new Date();
        DATE.setTime(DATE.getTime() + 365 * 24 * 3600 * 1000);
        document.cookie = 'lang=' + current + '; path=/; expires=' + DATE.toUTCString();
      }
    }
  },

  auth: {
    cookie: {
      prefix: 'auth'
    },
    localStorage: false,
    redirect: {
      login: '/auth/login',
      home: '/',
    },
    strategies: {
      local: {
        endpoints: {
          login: {
            url: 'oauth/token',
            method: 'post',
            propertyName: 'access_token'
          },
          logout: false,
          user: { url: '/api/user', method: 'get', propertyName: 'user' }
        }
      }
    },
  },
  /*
   ** Axios module configuration
   ** See https://axios.nuxtjs.org/options
   */
  axios: {
    baseURL: '/',
    credentials: true
  },
  /*
   ** vuetify module configuration
   ** https://github.com/nuxt-community/vuetify-module
   */
  vuetify: {
    customVariables: ['~/assets/variables.scss'],
    rtl: false,
    theme: {
      dark: false
    }
  },
  workbox: {
    offline: true,
    autoRegister: true
  },
  manifest: {
    name: 'Tabiby',
    short_name: 'tabiby',
    start_url: '/',
    lang: 'en'
  },
  router: {
    middleware: 'i18n'
  },
  /*
   *  generate folder change
   * */
  generate: {
    dir: 'public',
  },
  /*
   ** Build configuration
   */
  build: {
    /*
     ** You can extend webpack config here
     */

    extend(config, ctx) {}
  }
}
