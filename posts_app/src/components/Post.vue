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
                        v-if="user && user.isLoggedIn && user.user.id === postFile.user_id"
                        class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <EditIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Editar</p>
                    </button>
                    <button  v-if="user && user.isLoggedIn && user.user.id === postFile.user_id" type="button" @click="deleteBtn()"
                        class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <DeleteIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Deletar</p>
                    </button>
                    <button v-if="user && user.isLoggedIn && user.user.id === postFile.user_id" type="button" @click="publishBtn()"
                        class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <PublishIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Publicar</p>
                    </button>
                </div>
            </div>
        </form>
        <div class="bg-white rounded-b-lg p-4">
            <div v-if="comments.length" class="space-y-2 my-2 py-2  border-b border-b-lime-500">
                <div v-for="comment in comments" :key="comment.id">
                    <div class="flex">
                        <p class="font-bold text-lime-600">@{{ comment.name }}</p>
                        <p class="font-thin">: {{ comment.description }}</p>
                    </div>
                </div>
            </div>
            <div v-if="user && user.isLoggedIn" >
                <input type="text" placeholder="comente....." class="p-2 w-full" v-model="comment">
            </div>
            <div  v-if="user && user.isLoggedIn" class="flex mt-4">
                <button type="button" @click="commentPublishBtn()"
                    class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                    <div class="h-8 w-8 rounded-full bg-lime-300">
                        <PublishIcon class="h-8 w-8 rounded p-2" />
                    </div>
                    <p class="font-bold">Publicar</p>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import RouteIcon from './icons/IconRoute.vue'
import EditIcon from './icons/Edit.vue'
import DeleteIcon from './icons/Delete.vue'
import CommentIcon from './icons/Comment.vue'
import PublishIcon from './icons/Publish.vue'

import { updatePosts, completePost, removePosts } from '@/http/posts-api'
import { createOpnions, allOpnions } from '@/http/opnions-api'

import { useAuthStore } from '@/store/auth';

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
    computed: {
        user() {
            const store = useAuthStore();
            return store
        }
    },
    data() {
        return {
            form: {
                title: this.postFile.name || null,
                description: this.postFile.description || null,
            },
            editName: false,
            editDescription: false,
            comment: null,
            comments: [],
        };
    },
    mounted() {
        this.Allcomments();
    },
    methods: {
        toggleName() {
            this.editName = true;
        },
        toggleDescription() {
            this.editDescription = true;
        },
        async submitEdited() {
            const data = await updatePosts(this.postFile.id, {
                name: this.form.title,
                description: this.form.description,
                post_id: this.postFile.id,
                user_id: this.user.user.id,
            });

            if (data.status === 200) {
                this.$emit('refresh', true);
            }
        },
        async publishBtn() {
            const data = await completePost(this.postFile.id, {
                name: this.form.title,
                description: this.form.description,
                read: true,
                post_id: this.postFile.id,
                user_id: this.user.user.id,
            });

            if (data.status === 200) {
                this.$emit('refresh', true);
            }
        },
        async deleteBtn() {
            const data = await removePosts(this.postFile.id);

            if (data.status === 204) {
                this.$emit('refresh', true);
            }
        },
        async commentPublishBtn() {
            if (this.comment) {

                const opnion = {
                    name: this.user.user.name || 'anonimo',
                    description: this.comment,
                    post_id: this.postFile.id,
                    user_id: this.user.user.id,

                }

                const data = await createOpnions(opnion);

                if (data.status === 201) {
                    this.$emit('refresh', true);
                    this.Allcomments();
                    this.comment = null
                }
            }
        },
        async Allcomments() {
            if (this.postFile) {
                const { data } = await allOpnions();

                if (data?.data) {
                    const sendedComments = data.data.filter((comment) => comment.post_id === this.postFile.id);
                    if (sendedComments.length > 0) {
                        this.comments = sendedComments;
                    }
                }
            }
        }
    }
}

</script>