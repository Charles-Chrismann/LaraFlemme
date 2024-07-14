<template>
  <div>
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
              <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                alt="Your Company">
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <Link :href="route('tracks.index')" class="rounded-md px-3 py-2 text-sm font-medium"
                  :class="[route().current().includes('tracks') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']">
                Musiques
                </Link>
                <Link v-if="$page.props.auth.user" :href="route('playlists.index')"
                  class="rounded-md px-3 py-2 text-sm font-medium"
                  :class="[route().current().includes('playlists') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']">
                Playlists
                </Link>
                <Link v-if="$page.props.auth.user" :href="route('apikeys.index')"
                  class="rounded-md px-3 py-2 text-sm font-medium"
                  :class="[route().current().includes('apikey') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']">
                Api Keys
                </Link>
              </div>
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <div class="relative ml-3">
              <Link v-if="!$page.props.auth.user" :href="route('login')"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4 me-3">
              Se connecter
              </Link>
              <Link v-if="!$page.props.auth.user" :href="route('register')"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4 mr-3">
              Créer un compte
              </Link>
              <Link v-if="$page.props.auth.user" :href="route('logout')" as="button" method="POST"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4 mr-3">
              Se déconnecter
              </Link>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="px-16">
      <div class="flex justify-between items-center">
        <h4 class="text-3xl font-bold my-6">
          <slot name="title" />
        </h4>
        <div>
          <slot name="action" />
        </div>
      </div>
      <slot name="content" />
    </div>
  </div>
</template>

<script>
export default {
  name: 'MusicLayout',
}
</script>
