// import axios from 'axios'

// const api = axios.create({
//   baseURL: 'http://127.0.0.1:8000/api/v1',
//   headers: {
//     'Content-Type': 'application/json',
//   }
// })

// export default {
  
//   getAllTasks() {
//     return api.get('/tasks')
//   },
//   getDoneTasks() {
//     return api.get('/tasks?completed=true')
//   },
//   getUndoneTasks() {
//     return api.get('/tasks?completed=false')
//   },

//   createTask(data) {
//     return api.post('/tasks', data)
//   },

//   updateTask(id, data) {
//     return api.patch(`/tasks/${id}`, data)
//   },

//   deleteTask(id) {
//     return api.delete(`/tasks/${id}`)
//   }

// }

import axios from 'axios'

const api = axios.create({
  baseURL: "http://127.0.0.1:8000/api/v1",
  headers:{
    "Content-Type": 'application/json'
  }
})
export default {
  getAllTasks(){
    return api.get("/tasks")
  },
  getDoneTasks(){
    return api.get('/tasks?completed=true')
  },
  getUndoneTasks(){
    return api.get('/tasks?completed=false')
  },
  createTask(data){
    return api.post('/tasks', data)
  },
  updateTask(id,data){
    return api.patch(`/tasks/${id}`, data)
  },
  deleteTask(id){
    return api.delete(`/tasks/${id}`)
  }

}