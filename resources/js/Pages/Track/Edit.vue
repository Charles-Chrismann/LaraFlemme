<template>
  <MusicLayout>
    <template #title>
      Modifier une musique
    </template>
    <template #action>
      <Link :href="route('tracks.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
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

        <!-- Artist -->
        <div class="mb-3">
          <label for="artist" class="block text-gray-700 text-sm font-bold mb-2">Artiste</label>
          <input id="artist" v-model="form.artist" type="text"
            class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2"
            :class="{ 'border-red-500': form.errors.artist }" placeholder="Artiste">
          <p class="text-red-500 text-xs italic">{{ form.errors.artist }}</p>
        </div>

        <!-- Display -->
        <div class="mb-3">
          <label for="artist" class="block text-gray-700 text-sm font-bold mb-2">Afficher la musique</label>
          <select name="display" id="display" v-model="form.display"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            :class="{ 'border-red-500': form.errors.display }">
            <option :value="true">Oui</option>
            <option :value="false">Non</option>
          </select>
          <p class="text-red-500 text-xs italic">{{ form.errors.display }}</p>
        </div>

        <input type="submit" value="Modifier la musique" class=" text-white font-bold rounded py-2 px-4"
          :class="[form.processing ? 'bg-gray-500' : 'bg-blue-500 hover:bg-blue-700']" :disabled="form.processing">
      </form>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';

export default {
  name: 'Edit',
  components: {
    MusicLayout,
  },
  props: {
    track: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        title: this.track.title,
        artist: this.track.artist,
        display: this.track.display ? true : false,
      }),
    }
  },
  methods: {
    submit() {
      this.form.put(route('tracks.update', { track: this.track }));
    }
  }
}
</script>
