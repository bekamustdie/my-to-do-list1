<script setup>
    const props = defineProps({
        links:{
            type: Object,
            required:true
        }

    })
    console.log(props.links)
</script>

<template>
    <div class="m-3">
        <a class="cursor-pointer p-3 border bg-red mx-2" :href="props.links.prev">prev</a>
        <a class="cursor-pointer p-3 border bg-red mx-2" :href="props.links.next">next</a>
    </div>
</template>