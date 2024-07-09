<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'

export default {
  name: 'index',
  components: {
    MusicLayout

  },
  props: {
    tracks: Array,
  }
}
</script>

<template>
  <music-layout>
    <template #content>
      <div>
        Liste de mes tracks
    
        <ul>
          <li
            v-for="track in tracks"
            :key="track.uuid"
          >
            {{ track.title }}
          </li>
        </ul>
      </div>
    </template>
  </music-layout>
</template>