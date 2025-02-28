<template>
    <div>
        <div class="border bg-white shadow rounded p-4 flex flex-col">
            <div class="flex">
                <div class="h-12 w-12 rounded-full bg-lime-300">
                    <RouteIcon class="h-12 w-12 rounded p-2" />
                </div>
                <div class="flex flex-col ml-4">
                    <div class="text-2xl font-bold">
                        Title
                    </div>
                    <div class="font-thin">
                        Description
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex space-x-4">
                    <div class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2" >
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <EditIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Editar</p>
                    </div>
                    <div class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <DeleteIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Deletar</p>
                    </div>
                    <div class="focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4 flex items-center justify-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-lime-300">
                            <CommentIcon class="h-8 w-8 rounded p-2" />
                        </div>
                        <p class="font-bold">Comentar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RouteIcon from './icons/IconRoute.vue'
import EditIcon from './icons/Edit.vue'
import DeleteIcon from './icons/Delete.vue'
import CommentIcon from './icons/Comment.vue'

export default {
    components: {
        RouteIcon,
        EditIcon,
        DeleteIcon,
        CommentIcon
    }
    // ...
}

</script>