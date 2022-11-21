<template lang="">
    <div>
      <Nav /><br>
      <br></br>
      <br></br>
  
  
  
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-8 m-auto">
              <div class="card mb-3" style="max-width: ">
                <div class="card-header text-white bg-primary text-center">
                 Add file
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-9 m-auto">
                      <div class="card">
                        <div class="card-body">
                            <form enctype="multipart/form-data">
                <div>
                  <label
                    for="email"
                    class="block text-sm font-medium text-gray-700"
                  >
                    Image
                  </label>
                  <div class="mt-1">
                    <input
                      required
                      class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      @change="changeFile"
                      name="file"
                      type="file"
                    />
                  </div>
                </div>

                <div>
                  <button class="btn btn-info" @click="submit" type="button">Submit</button>
                 
                </div>
              </form>
                          <br />
  
                          <div>
                          <div class="row" v-for="(todo,i) in todos" :key="todo.id">
                            <div class="col-md-6">{{ todo.content }}</div>
                            <button @click ="updateStatus(todo,i)" class="btn btn-info" v-if="todo.is_done">Not Done</button>
                            <button @click ="updateStatus(todo,i)" class="btn btn-info" v-else>Done</button>
  
                            <button @click ="remove(todo,i)" class="btn btn-danger">remove</button>
                          </div>
                        </div>
  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  <script>



export default {
  data() {
    return {
      file: null,
     
    };
  },
  methods: {
    changeFile(e) {
      this.file = e.target.files[0];
      console.log(this.file);
    },
    async submit(e) {

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                data.append('file', this.file);
     
      const url = "http://localhost:8000/api/todos";
 
      const response = await this.$axios.$post(url, data, config);
      console.log(response);

    },
  },
};













  
//   export default {
//       data() {
//           return{
  
//               content:'',
//               todos:[],
//           }
//       },
//       methods:{
  
//           submit(){
  
//               this.$axios.post('http://localhost:8000/api/todos' ,{content:this.content}).then(res=>{
//                   this.todos.unshift(res.data);
//                   this.content = '';
  
//               }).catch(error=>{
//                   console.log(error);
//               }).finally(()=>{
                 
//               });
//           },
  
//           updateStatus(todo,i){
  
//             let api = 'http://localhost:8000/api/todos/'+todo.id;
  
//               this.$axios.put(api).then(res=>{
//                 this.todos[i].is_done = res.data.is_done;
//                 alert('success');
//               }).catch(error=>{
//                   console.log(error);
//               }).finally(()=>{
                
//               });
//               },
  
  
//             remove(todo,i){
  
//             let api = 'http://localhost:8000/api/todos/'+todo.id;
  
//               this.$axios.delete(api).then(res=>{
//                if(res.data == true) {
//                 this.todos.splice(i,1)
//                }
              
//               }).catch(error=>{
//                   console.log(error);
//               }).finally(()=>{
                
//               });
//               }
  
//       },
//       async fetch(){
//           this.todos = await fetch('http://127.0.0.1:8000/api/todos').then(res=>res.json())
//       }
//   };
  </script>
  <style lang=""></style>
  