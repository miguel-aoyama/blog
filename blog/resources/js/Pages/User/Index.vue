<template>
  <div class="p-4">
    <h1 class="text-lg font-bold">ユーザ一覧</h1>
    <ul>
       <li v-for="user in users" :key="user.id">{{user.id}}{{user.name}}</li>
    </ul>
    <inertia-link href="/dashboard">Dashboard</inertia-link>
  </div>
</template>
<script>
  
  export default {
    props:{
      users: {
        type: Array,
      }
    }
  }
</script>
