<script setup>
	import { ref, onMounted } from 'vue'
	import api from '@/services/api'
	const tasks = ref([])
	const error = ref('')
	const getTasks = async ()=>{
		try{
			const response = await api.getTasks()
			tasks.value = response.data
		}
		catch(err){
			error.value = 'something went wrong'
    		console.error('problem->', err)
			console.log("didnt work ")
		}
	}
	onMounted(() => {
		getTasks()
	})
</script>
<template>
	<div class="max-w-2xl my-[10px] bg-[#f9f9f9] mx-auto p-[20px] rounded-lg shadow-md">
		<div class="flex flex-col bg-[#dff5da] w-full mx-auto my-[10px] p-[30px] rounded-lg shadow-md">
			<div v-for="task in tasks" :key="task.id" class="flex">
				<input type="checkbox" class="w-[20px]">
				<p class="flex-1 text-center my-auto">{{task.title}}</p>
				<div class="text-xs flex flex-col gap-4 mx-5">
					<span>{{task.deadline}}</span>
					<span>{{task.priority}}</span>
				</div>
				<a href="" class="p-2">🗑️</a>
			</div>
		</div>
	</div>
</template>