<template>
    <header class="bg-white absolute top-0 left-0 w-full">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Posts</span>
                    <div class="h-12 w-12 rounded-full">
                        <RouteIcon class="h-12 w-12 rounded" />
                    </div>
                </a>
            </div>

            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Log in <span
                        aria-hidden="true">&rarr;</span></a>
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