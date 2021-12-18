<template>
  <header class="bg-gray-200">
    <inertia-link href="/" class="text-blue-700 underline m-2">Home</inertia-link>
    <inertia-link href="/HelloWorld" class="text-blue-700 underline m-2">HelloWorld</inertia-link>
    <inertia-link :href="route('bookmark.index')" class="text-blue-700 underline m-2">bookmarks</inertia-link>
    <input type="text" name="search" size="15" class="p-1 m-1 text-sm" />
    <button type="submit" class="border border-gray-400 m-1 p-1 text-sm">ブックマーク検索</button>
  </header>
  <article>
    <slot />
  </article>
</template>

<script>
  export default {
    props: {
      //親コンポーネントから渡される
      title: String,
    },
    watch: {
      title: {
        immediate: true,
        handler(title) {
          document.title = title
        },
      },
    },
  }
 </script>
