<template>
  <MusicLayout>
    <template #action>
      <Link :href="route('apikeys.create')"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
      Créer une api key
      </Link>
    </template>
    <template #content>
      <div>
        <ul class="flex flex-col gap-2">
          <li v-for="apikey in apikeys" :key="apikey.id" class="flex w-full items-center justify-between">
            <div class="flex flex-col">
              <span class="font-bold text-lg">{{ apikey.name }}</span>
              <span>{{ apikey.key }}</span>
            </div>
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
