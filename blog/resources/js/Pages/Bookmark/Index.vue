<template>
  <div>
    <layout title="bookmarks">
      <h2 class="text-lg border-b p-1">
        <inertia-link :href="route('bookmark.index')" class="text-blue-700 underline">
        bookmark index
        </inertia-link>
      </h2>
      <ul class="list-disc list-inside p-2">
        <li v-for="bookmark in bookmarks">
          <a :href="bookmark.url" target=_blank class="text-blue-700"> {{bookmark.title}}</a>
        </li>
      </ul>
    </layout>
  </div>
</template>

<script>
  import Layout from '@/Pages/Layout'

  export default {
    
    layout: Layout,
    props:{
      bookmarks: {
        type: Array,
      }
    },
  }
  </script>
