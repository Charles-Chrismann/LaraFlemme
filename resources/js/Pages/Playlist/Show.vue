<template>
  <MusicLayout>
    <template #title>
      Musiques de la playlist: {{ playlist.title }}
    </template>
    <template #action>
      <Link :href="route('tracks.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
      Créer une musique
      </Link>
    </template>
    <template #content>
      <TrackList :tracks="tracks" />
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import TrackList from '@/Components/Track/TrackList.vue';

export default {
  name: 'Show',
  components: {
    MusicLayout,
    TrackList,
  },
  props: {
    playlist: Object,
    tracks: Array,
  },
}
</script>
