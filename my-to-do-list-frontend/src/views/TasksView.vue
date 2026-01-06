<script setup>
	import { ref, onMounted } from 'vue'
	import api from '@/services/api'
	import AddTask from '@/components/AddTask.vue'
	import Task from '@/components/Task.vue'
	import Button from '@/components/Button.vue'
	
	const tasks = ref([])
	const error = ref('')

	const getTasks = async ()=>{
		try{
			const response = await api.getTasks()
			tasks.value  = response.data.data
		}
		catch(err){
			error.value = 'something went wrong'
    		console.error('problem->', err)
			console.log("didnt work")
		}
	}

	const createTask = async ()=>{
		try{
			await api.createTask(newTask.value)
			newTask.value = {title:"", deadline:"", priority:"medium"}
		}
		catch{
			error.value = 'something went wrong'
			console.error(err)
		}
	}
	const deleteTask = async (id) => {
	  try {
		await api.deleteTask(id)
		await loadTasks()
	  } catch (err) {
		console.error(err)
	  }
	}
	
	
	const toggleTask = async (task) => {
	  try {
		await api.updateTask(task.id, {
		  completed: !task.completed
		})
		await loadTasks()
	  } catch (err) {
		console.error(err)
	  }
	}
	onMounted(() => {
		getTasks()
	})
	</script>
	
	<template>
		<div class="max-w-2xl mt-[50px] mb-[20px]  mx-auto p-[30px] rounded-lg ">
			<AddTask/>
			<div class="flex flex-wrap w-[90%] justify-between mx-auto mb-5">
				<Button  text="Undone"/>
				<Button  text="All"/>
				<Button  text="Done"/>
			</div>
			<div class="max-w-2xl my-[10px] bg-[#f9f9f9] mx-auto p-[20px] rounded-lg shadow-md">
				<div v-for="task in tasks" :key="task.id" class="flex flex-col bg-[#dff5da] w-full mx-auto my-[10px] p-[30px] rounded-lg shadow-md">
					<Task :task="task"/>
				</div>
			</div>
		</div>
	</template>
	
	<style scoped>
	
	
	.create-form {
	  display: flex;
	  gap: 10px;
	  margin-bottom: 30px;
	  flex-wrap: wrap;
	}
	
	.create-form input,
	.create-form select {
	  padding: 12px;
	  border: 2px solid #ddd;
	  border-radius: 8px;
	  font-size: 14px;
	  flex: 1;
	  min-width: 150px;
	}
	
	.create-form button {
	  padding: 12px 24px;
	  background: #42b983;
	  color: white;
	  border: none;
	  border-radius: 8px;
	  cursor: pointer;
	  font-weight: bold;
	}
	
	.task-list {
	  list-style: none;
	  padding: 0;
	}
	
	.task-list li {
	  display: flex;
	  align-items: center;
	  gap: 15px;
	  padding: 18px;
	  background: white;
	  border-radius: 8px;
	  margin-bottom: 12px;
	}
	
	.task-list li.completed {
	  opacity: 0.6;
	}
	
	.task-list li.completed .task-info strong {
	  text-decoration: line-through;
	}
	
	.task-info {
	  flex: 1;
	  display: flex;
	  flex-direction: column;
	  gap: 8px;
	}
	
	.delete-btn {
	  padding: 8px 16px;
	  background: #e74c3c;
	  color: white;
	  border: none;
	  border-radius: 6px;
	  cursor: pointer;
	}
	
	.empty {
	  text-align: center;
	  padding: 40px;
	  color: #95a5a6;
	  font-size: 18px;
	}
	</style>