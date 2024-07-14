<template>
  <MusicLayout>
    <template #title>
      Créer une api key
    </template>
    <template #action>
      <Link :href="route('apikeys.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
      Retour
      </Link>
    </template>
    <template #content>
      <form @submit.prevent="submit">
        <!-- Titre -->
        <div class="mb-3">
          <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
          <input id="title" v-model="form.name" type="text"
            class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2"
            :class="{ 'border-red-500': form.errors.name }" placeholder="Nom">
          <p class="text-red-500 text-xs italic">{{ form.errors.name }}</p>
        </div>

        <input type="submit" value="Créer l'api key" class=" text-white font-bold rounded py-2 px-4"
          :class="[form.processing ? 'bg-gray-500' : 'bg-blue-500 hover:bg-blue-700']" :disabled="form.processing">
      </form>
    </template>
  </MusicLayout>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import MusicLayout from '@/Layouts/MusicLayout.vue';

export default {
  name: 'Create',
  components: {
    Link,
    MusicLayout,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: '',
      }),
    }
  },
  methods: {
    submit() {
      this.form.post(route('apikeys.store'), {
        preserveState: false,
      });
    }
  }
}
</script>
