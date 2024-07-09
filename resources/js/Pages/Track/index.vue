<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'
import Track from '@/Components/Track.vue'
import { Link as InerLink } from '@inertiajs/vue3'

export default {
  name: 'index',
  components: {
    MusicLayout,
    Track,
    InerLink
  },
  props: {
    tracks: Array,
  },
  data() {
    return {
      audio: null,
      currentTrack: null,
      filter: '',
      InerLink
    }
  },
  computed: {
    filterTracks() {
      return this.tracks.filter(track => track.title.toLowerCase().includes(this.filter.toLowerCase()) || track.artist.toLowerCase().includes(this.filter.toLowerCase()))
    }
  },
  methods: {
    handlePlayed(track) {
      const url = `/storage/${track.music}`

      if(!this.currentTrack) {
        this.audio = new Audio(url)
        this.audio.play()
      } else if(this.currentTrack !== track.uui) {
        this.audio.pause()
        this.audio.src = url
        this.audio.play()
      } else {
        this.audio.paused ? this.audio.play() : this.audio.pause()
      }

      this.currentTrack = track.uuid
      this.audio.addEventListener('ended', () => this.currentTrack = null)
    }
  }
}
</script>

<template>
  <music-layout>
    <template #content>
      <div>
        <input v-model="filter" type="text">
        <InerLink :href="route('tracks.create')" >Ajouter une musique</InerLink>
        <div>
          Liste de mes tracks
      
          <ul>
            <Track
              v-for="track in filterTracks"
              :key="track.uuid"
              :track="track"
              @played="handlePlayed"
            />
            <!-- <li
              v-for="track in tracks"
              :key="track.uuid"
            >
              {{ track.title }}
            </li> -->
          </ul>
        </div>
      </div>
    </template>
  </music-layout>
</template>