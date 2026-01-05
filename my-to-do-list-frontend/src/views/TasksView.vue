<script setup>
	import { ref, onMounted } from 'vue'
	import api from '@/services/api'
	import AddTask from '@/components/AddTask.vue'
	import GetTasks from '@/components/GetTasks.vue'
	
	const tasks = ref([])
	const error = ref('')

	const getTasks = async ()=>{
		try{
			await api.getTasks()
		}
		catch{
			error.value = 'something went wrong'
			console.error(error)
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
	// const loadTasks = async () => {
	//   try {
	// 	loading.value = true
	// 	const response = await api.getTasks()
	// 	tasks.value = response.data.data || response.data
	//   } catch (err) {
	// 	error.value = 'Something went wrong'
	// 	console.error(err)
	//   }
	// }
	
	// const createTask = async () => {
	//   try {
	// 	await api.createTask(newTask.value)
	// 	newTask.value = { title: '', deadline: '', priority: 'medium' }
	// 	// await loadTasks()
	//   } catch (err) {
	// 	error.value = 'Ошибка создания задачи'
	// 	console.error(err)
	//   }
	// }
	
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
		<AddTask/>
		<GetTasks/>
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