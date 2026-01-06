<script setup>
	const props = defineProps({
		text:{
			required:true,
			type: String,
			default: "Button"
		},
		color:{
			type: String,
			default: "#73b2ff"
		}
	})

</script>

<template>
	<button :style="{backgroundColor: props.color}" class="bg-[#42b983] color-white py-[10px] px-[20px] rounded-lg cursor-pointer shadow-lg">{{props.text}}</button>
</template>