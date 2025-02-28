<template>
    <div>
        <form v-if="postFile" class="border bg-white shadow rounded p-4 flex flex-col" @submit.prevent="submitEdited()">
            <div class="flex">
                <div class="h-12 w-12 rounded-full bg-lime-300">
                    <RouteIcon class="h-12 w-12 rounded p-2" />
                </div>
                <div class="flex flex-col ml-4">
                    <div @click="toggleName()" class="text-2xl font-bold">
                        <p v-if="!editName">
                            {{ postFile.name }}
                        </p>
                        <div v-else class="text-2xl font-bold">
                            <input type="text" class="w-full pl-2" placeholder="título...." id="title"
                                v-model="form.title" required />
                        </div>
                    </div>
                    <div @click="toggleDescription()" class="font-thin">
                        <p v-if="!editDescription">
                            {{ postFile.description }}
                        </p>
                        <div v-else class="font-thin mt-4 w-full">
                            <input type="text" class="w-full pl-2" placeholder="descrição...." id="description"
                                v-model="form.description" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex space-x-4">
                    <button type="submit"
                        class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <EditIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Editar</p>
                    </button>
                    <button type="button"
                        @click="deleteBtn()"
                        class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <DeleteIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Deletar</p>
                    </button>
                    <button type="button"
                        @click="publishBtn()"
                        class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <PublishIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Publicar</p>
                    </button>
                    <button v-if="postFile.read" type="button"
                        class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <CommentIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Comentar</p>
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import RouteIcon from './icons/IconRoute.vue'
import EditIcon from './icons/Edit.vue'
import DeleteIcon from './icons/Delete.vue'
import CommentIcon from './icons/Comment.vue'
import PublishIcon from './icons/Publish.vue'

import { updatePosts, completePost, removePosts } from '@/http/posts-api'

export default {
    components: {
        RouteIcon,
        EditIcon,
        DeleteIcon,
        CommentIcon,
        PublishIcon
    },
    props: {
        postFile: {
            type: Object,
            required: true,
        }
    },
    data() {
        return {
            form: {
                title: this.postFile.name || null,
                description: this.postFile.description || null ,
            },
            editName: false,
            editDescription: false,
        };
    },
    methods: {
        toggleName() {
            this.editName = true;
        },
        toggleDescription() {
            this.editDescription = true;
        },
        async submitEdited(){
            const data = await updatePosts(this.postFile.id, {
                name: this.form.title,
                description: this.form.description
            });

            if(data.status === 200) {
                this.$emit('refresh', true);
            }
        },
        async publishBtn(){
            const data = await completePost(this.postFile.id, {
                name: this.form.title,
                description: this.form.description,
                read: true
            });

            if(data.status === 200) {
                this.$emit('refresh', true);
            }
        },
        async deleteBtn(){
            const data = await removePosts(this.postFile.id);
            console.log("🚀 ~ deleteBtn ~ data:", data)

            if(data.status === 204) {
                this.$emit('refresh', true);
            }
        }
    }
}

</script>