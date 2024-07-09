<script>
import MusicLayout from '@/Layouts/MusicLayout.vue'
import Track from '@/Components/Track.vue'
import { Link as InerLink } from '@inertiajs/vue3'

export default {
  name: 'create',
  components: {
    MusicLayout,
    Track,
    InerLink
  },
  props: {
  },
  data() {
    return {
      form: this.$inertia.form({
        title: '',
        artist: '',
        music: null,
        image: null,
        display: null
      })
    }
  },
  methods: {
    handleSubmit() {
      this.form.post(route('tracks.store'))
    }
  }
}
</script>

<template>
  <music-layout>
    <template #content>
      <div>
        <form @submit.prevent="handleSubmit">
          <div>
            <label for="title">titre</label>
            <input v-model="form.title" type="text" id="title">
            <p></p>
          </div>
          <div>
            <label for="artist">artist</label>
            <input v-model="form.artist" type="text" id="artist">
            <p></p>
          </div>
          <div>
            <label for="display">display</label>
            <select v-model="form.display" name="display" id="display">
              <option :value="true">oui</option>
              <option :value="false">non</option>
            </select>
            <p></p>
          </div>
          <div>
            <label for="image">image</label>
            <input @input="form.image = $event.target.files[0]" type="file" id="image">
            <p></p>
          </div>
          <div>
            <label for="audio">audio</label>
            <input @input="form.audio = $event.target.files[0]" type="file" id="audio">
            <p></p>
          </div>

          <input type="submit" value="Creer la mumu" :disabled="form.processing">
        </form>
      </div>
    </template>
  </music-layout>
</template>