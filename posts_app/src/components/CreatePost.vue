<template>
    <div>
        <form class="border bg-white shadow rounded p-4 flex flex-col" @submit.prevent="submitBtn()">
            <div class="flex">
                <div class="h-12 w-12 rounded-full bg-lime-300">
                    <RouteIcon class="h-12 w-12 rounded p-2" />
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <div class="text-2xl font-bold">
                        <input type="text" class="w-full pl-2" placeholder="título...." id="title" v-model="form.title" required />
                    </div>
                    <div class="font-thin mt-4 w-full">
                        <input type="text" class="w-full pl-2" placeholder="descrição...." id="description"  v-model="form.description" required/>
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <div class="flex space-x-4">
                    <button type="submit"
                        class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <SubmitIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Publicar</p>
                    </button>
                    <button type="button"
                        @click="cancelBtn()"
                        class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <CancelIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Cancelar</p>
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import RouteIcon from './icons/IconRoute.vue'
import SubmitIcon from './icons/Submit.vue'
import CancelIcon from './icons/Cancel.vue'


export default {
    components: {
        RouteIcon,
        SubmitIcon,
        CancelIcon,
    },
    data() {
        return {
            form: {}
        };
    },
    methods: {
        submitBtn() {
            this.$emit('publish', this.form);
        },
        cancelBtn() {
            this.$emit('cancel', true);
        },
    }
}

</script>