export default class Message {
  constructor(buefy) {
    this.buefy = buefy
  }

  showErrorMessage(message, duration = 5000) {
    this.buefy.toast.open({
      duration,
      message,
      position: 'is-bottom',
      type: 'is-danger',
    })
  }

  showSuccessMessage(message, duration = 5000) {
    this.buefy.toast.open({
      duration,
      message,
      position: 'is-bottom',
      type: 'is-success',
    })
  }
}
