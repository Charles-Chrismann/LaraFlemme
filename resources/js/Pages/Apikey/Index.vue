<template>
  <MusicLayout>
    <template #content>
      <div>
        <ul>
          <li v-for="apikey in apikeys" :key="apikey.id">
            {{ apikey.name }}
            <Link :href="route('apikeys.destroy', { apikey: apikey })" class="bg-red-600 hover:bg-red-700 text-white font-bold rounded py-2 px-4" as="button" method="delete">Delete</Link>
          </li>
        </ul>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
  name: 'Index',
  components: {
    MusicLayout,
    Link
  },
  props: {
    apikeys: Array
  }
}
</script>
