<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Blog
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                  <a :href="route('blog.create')">
                    <jet-button class="bg-blue-700 text-base">Blog Create</jet-button>
                  </a>
                  </div>
                <table>
                  <thead>
                  <tr>
                    <th class="w-3/12">title</th>
                    <th class="w-7/12">contents</th>
                    <th class="w-2/12">edit</th>
                    <th class="w-2/12">delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr v-for="blog in blogs" :key="blog.id">
                      <td class="border px-4 py-2">{{blog.title}}</td>
                      <td class="border px-4 py-2">{{blog.content}}</td>
                      <td class="border px-4 py-2 text-base">
                        /**blog.idを渡すことによってパラメータにidが入る*/
                        <a :href="route('blog.edit', blog.id)">
                        <jet-button class="bg-green-700 textbase"
                        >edit</jet-button>
                        </a>
                      </td>
                      <td class="border px-4 py-2 text-base">
                        <jet-button class="bg-red-700 text-base"
                        @click.native="deleteBlog(blog.id)">delete</jet-button>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue';
    import JetButton from "@/Jetstream/Button";

    export default defineComponent({
        props:['locations','blogs'],
        components: {
            AppLayout,
            JetButton,
        },
        data() {
          return {
          //POSTやDELETEを行うときに必要になる
            form: this.$inertia.form(
              {
                _method: "DELETE",
              }
            ),
          };
        },
        methods:{
          deleteBlog(id){
          //POSTやDELETEを行うときに必要になる
            this.form.post(route("blog.destroy", id), {
              preserveScroll: true,
            });
          }
        }
    })
</script>
