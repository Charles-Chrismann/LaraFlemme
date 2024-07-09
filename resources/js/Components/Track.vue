<script>
export default {
  name: 'Track',
  emits: ['played'],
  props: {
    track: Object
  },
  methods: {
    handleClick() {
      this.$emit('played', this.track)
    }
  }
}
</script>

<template>
  <li>
    <h4>{{ track.title }}</h4>
    <img :src="`/storage/${track.image}`" alt="">
    <button
      @click="handleClick"
    >Play</button>
  </li>
</template>