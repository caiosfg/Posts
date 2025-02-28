<template>
    <header class="bg-gray-100 w-full">
        <nav class="mx-auto flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex focus:bg-lime-300 hover:bg-lime-300 rounded-full p-4">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Posts</span>
                    <div class="h-12 w-12 rounded-full">
                        <RouteIcon class="h-12 w-12 rounded" />
                    </div>
                </a>
            </div>
            <div class="flex space-x-4">
                <div class="flex focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4">
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">Postagens <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
                <div class="flex focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4">
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">Comentários <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            </div>

            <div class="flex space-x-4">
                <div class="flex focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4">
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">Log in <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
                <div class="flex focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4">
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">Register <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
                <div class="flex focus:bg-lime-300 hover:bg-lime-300 rounded-full px-4">
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">Log out <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
import RouteIcon from './icons/IconRoute.vue'

export default {
    components: {
        RouteIcon
    }
    // ...
}

</script>