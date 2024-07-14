<template>
  <MusicLayout>
    <template #title>
      Liste de mes playlists
    </template>
    <template #action>
      <Link :href="route('playlists.create')"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
      Créer une playlist
      </Link>
    </template>
    <template #content>
      <table class="table-auto">
        <thead>
          <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Nombre de musiques</th>
            <th>Créée le</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(playlist, i) in playlists" :key="playlist.uuid">
            <td>{{ i + 1 }}</td>
            <td>{{ playlist.title }}</td>
            <td>{{ playlist.tracks_count }} musiques</td>
            <td>{{ $moment(playlist.created_at).format('DD/MM/YYYY hh:mm:ss') }}</td>
            <td>
              <Link :href="route('playlists.show', { playlist: playlist })"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
              Voir
              </Link>
            </td>
          </tr>
        </tbody>
      </table>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';

export default {
  name: 'Index',
  components: {
    MusicLayout,
  },
  props: {
    playlists: Array,
  },
}
</script>
