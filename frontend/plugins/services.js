import Vue from 'vue'
import Message from '~/services/Message'

export default function ({ app }) {
  const services = {
    message: new Message(Vue.prototype.$buefy),
  }
  Vue.prototype.$services = services
  app.$services = services
}
