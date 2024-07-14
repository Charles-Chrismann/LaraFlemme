<template>
  <div>
    <input v-model="filter" type="search"
      class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-5">

    <div class="grid grid-cols-4 gap-4">
      <Track v-for="track in filteredTracks" :key="track.uuid" :track="track" :active="currentTrack === track.uuid"
        @played="play" />
    </div>
  </div>
</template>

<script>
import Track from '@/Components/Track/Track.vue';

export default {
  name: 'TrackList',
  components: {
    Track,
  },
  props: {
    tracks: Array,
  },
  data() {
    return {
      audio: null,
      currentTrack: null,
      filter: '',
    }
  },
  computed: {
    filteredTracks() {
      return this.tracks.filter(track =>
        track.title.toLowerCase().includes(this.filter.toLowerCase())
        || track.artist.toLowerCase().includes(this.filter.toLowerCase())
      );
    }
  },
  methods: {
    play(track) {
      const url = '/storage/' + track.music;

      if (!this.currentTrack) {
        this.audio = new Audio(url);
        this.audio.play();
      } else if (this.currentTrack !== track.uuid) {
        this.audio.pause();
        this.audio.src = url;
        this.audio.play();
      } else {
        this.audio.paused ? this.audio.play() : this.audio.pause();
      }

      this.currentTrack = track.uuid;
      this.audio.addEventListener('ended', () => this.currentTrack = null);
    }
  },
}
</script>
