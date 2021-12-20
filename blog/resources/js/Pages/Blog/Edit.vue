<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Blog
            </h2>
        </template>
        <div>
          <div class="max-w-7x1 mx-auto py-10 sm:-px-6 lg:px-8">
            <jet-form-section @submitted="editBlog">
              <template #title>Blog Edit</template>
              <template #description>Edit Blog</template>
              <template #form>
                <div class="col-span-6 sm:col-span-4">
                <jet-label for="title" value="title" />
                <jet-input
                  id="title"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.title"
                />

                </div>
                <div class="col-span-6 sm:col-span-4">
                  <jet-label for="content" value="content" />
                  <textarea v-model="form.content" class="mt-1 block w-full
                  form-input rounded-md shadow-sm"></textarea>

                </div>
              </template>
              <template #actions>
                <jet-button class="bg-blue-700">Edit</jet-button>
              </template>
            </jet-form-section>
          </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue';
    import JetFormSection from "@/Jetstream/FormSection";
    import JetInput from "@/Jetstream/Input";
    import JetLabel from "@/Jetstream/Label";
    import JetButton from "@/Jetstream/Button";


    export default defineComponent({
        props:['blog'],
        components: {
            AppLayout,
            JetFormSection,
            JetInput,
            JetLabel,
            JetButton,
        },
        data() {
          return {
            //POSTやDELETEを行うときに必要になる
            form: this.$inertia.form(
              {_method:"PUT",
              //バリデートのプロパティになる。Blogのidに応じた値が入る
              title: this.blog.title,
              content: this.blog.content,
              },
              {
                //コントローラーのvalidateWithBagの引数にする
                bag: "blogUpdate",
                //入力値を保持する
                resetOnSuccess: false,
              }
            )
          };
        },
        methods:{
          //コントローラーのstoreに送る
          editBlog(){
          //POSTリクエストを送る。editではIdも引数として送る
            this.form.post(route("blog.update", this.blog.id));
          }
        }
    })
</script>
