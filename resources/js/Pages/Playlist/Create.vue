<template>
  <MusicLayout>
    <template #title>
      Créer une playlist
    </template>
    <template #action>
      <Link :href="route('playlists.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
      Retour
      </Link>
    </template>
    <template #content>
      <form @submit.prevent="submit">
        <!-- Titre -->
        <div class="mb-3">
          <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
          <input id="title" v-model="form.title" type="text"
            class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2"
            :class="{ 'border-red-500': form.errors.title }" placeholder="Titre">
          <p class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
        </div>

        <!-- Tracks -->
        <div v-for="track in tracks" :key="track.uuid">
          <input :id="track.uuid" :value="track.uuid" v-model="form.tracks" type="checkbox" name="tracks" class="mr-5">
          <label :for="track.uuid">{{ track.title }}</label>
        </div>
        <p class="text-red-500 text-xs italic">{{ form.errors.tracks }}</p>

        <input type="submit" value="Créer la playlist" class=" text-white font-bold rounded py-2 px-4 my-5"
          :class="[form.processing ? 'bg-gray-500' : 'bg-blue-500 hover:bg-blue-700']" :disabled="form.processing">
      </form>
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
    tracks: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        title: '',
        tracks: [],
      }),
    }
  },
  methods: {
    submit() {
      this.form.post(route('playlists.store'));
    }
  }
}
</script>
