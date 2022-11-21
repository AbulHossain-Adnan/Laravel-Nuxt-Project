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
                Todo List
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-9 m-auto">
                    <div class="card">
                      <div class="card-body">
                        <!-- <form> -->
                          <div class="form-row align-items-center">
                            <div class="col-sm-8 my-1">
                              <label class="sr-only" for="inlineFormInputName"
                                >Name</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="inlineFormInputName" v-model="content"
                                placeholder="Add todo"
                              />
                            </div>

                            <div class="col-auto my-1 mt-10">
                              <button @click="submit" type="button" class="btn btn-primary">
                                Submit
                              </button>
                            </div>
                          </div>
                        <!-- </form> -->
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
        return{

            content:'',
            todos:[],
        }
    },
    methods:{

        submit(){

            this.$axios.post('http://localhost:8000/api/todos' ,{content:this.content}).then(res=>{
                this.todos.unshift(res.data);
                // this.todos.push(res.data);

                this.content = '';

            }).catch(error=>{
                console.log(error);
            }).finally(()=>{
               
            });
        },

        updateStatus(todo,i){

          let api = 'http://localhost:8000/api/todos/'+todo.id;

            this.$axios.put(api).then(res=>{
              this.todos[i].is_done = res.data.is_done;
              alert('success');
            }).catch(error=>{
                console.log(error);
            }).finally(()=>{
              
            });
            },


          remove(todo,i){

          let api = 'http://localhost:8000/api/todos/'+todo.id;

            this.$axios.delete(api).then(res=>{
             if(res.data == true) {
              this.todos.splice(i,1)
             }
            
            }).catch(error=>{
                console.log(error);
            }).finally(()=>{
              
            });
            }

    },
    async fetch(){
        this.todos = await fetch('http://127.0.0.1:8000/api/todos').then(res=>res.json())
    }
};
</script>
<style lang=""></style>
