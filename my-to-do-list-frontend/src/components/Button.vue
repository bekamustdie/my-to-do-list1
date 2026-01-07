<script setup>
	const props = defineProps({
		name:{
			type: String,
			default: "ordinaryButton"
		},
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
	const emit = defineEmits(["apply-filter"])
	const filter = ()=>{
		emit("apply-filter", props.name)
	}

</script>

<template>
	<button :style="{backgroundColor: props.color}" @click="filter" class="bg-[#42b983] color-white py-[10px] px-[20px] rounded-lg cursor-pointer shadow-lg">{{props.text}}</button>
</template>