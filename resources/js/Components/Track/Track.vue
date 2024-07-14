<template>
  <div class="max-w-sm rounded shadow-lg" :class="{ 'border border-blue-500': active }">
    <div class="w-full">
      <img :src="`/storage/${track.image}`" />
    </div>
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{ track.title }}</div>
      <small class="text-gray-700 text-base">{{ track.artist }}</small>
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded w-full mb-1" @click="handleClick">
      Lire
    </button>
    <div v-if="$page.props.isAdmin" class="w-ull flex justify-content-between">
      <Link :href="route('tracks.edit', { track: track })"
        class="bg-lime-600 hover:bg-lime-700 text-white font-bold rounded py-2 px-4">
      Modifier
      </Link>
      <Link :href="route('tracks.destroy', { track: track })"
        class="bg-red-600 hover:bg-red-700 text-white font-bold rounded py-2 px-4" as="button" method="delete">
      Supprimer
      </Link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Track',
  emits: ['played'],
  props: {
    active: {
      type: Boolean,
      default: false,
    },
    track: Object,
  },
  methods: {
    handleClick() {
      this.$emit('played', this.track);
    }
  }
}
</script>
