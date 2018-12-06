<template>
    <div>
      <div
        class="d-flex justify-content-between">
        <a v-if="create" v-bind:href="create">Create</a>
        <div class="form-group float-right">
          <input type="search" 
            class="form-control"
            v-model="search"
            placeholder="Search">{{search}}
      </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th 
            style="cursor: pointer;"
            v-on:click="orderColumn(index)"
            v-for="(title, index) in titles">{{title}}</th>
            
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in list">
            <td v-for="i in item">{{i}}</td>
           
            <td>
                <form v-bind:id="index"
                v-if="details && token" v-bind:action="deleted">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" v-bind:value="token">
                    <a v-if="details" v-bind:href="details">Details</a> |
                    <a v-if="edit" v-bind:href="edit">Edit</a> |
                    <a href="#" 
                      v-on:onclick="executeForm(index)">Delete</a>
                </form>
                <span v-if="!token">
                  <a v-if="details" v-bind:href="details">Details</a> |
                  <a v-if="edit" v-bind:href="edit">Edit</a> |
                  <a v-if="deleted" v-bind:href="deleted">Delete</a>
                </span>
                <span v-if="token && !details">
                    <a v-if="details" v-bind:href="details">Details</a> |
                    <a v-if="edit" v-bind:href="edit">Edit</a>
                </span>
            </td>
          </tr>
        </tbody>

      </table>
    </div>
</template>

<script>
export default {
    props: ['titles', 'items', 'order', 'orderCol',  "create", "details", "edit", "deleted", "token"],
    data: function () {
      return {
        search: '',
        orderAux: this.order || 'asc',
        orderAuxCol: this.orderCol || 0
      }
    },
    methods:{
      executeForm: function (index) {
        document.getElementById(index).submit();
      },
      orderColumn: function (column) {
        this.orderAuxCol = column;
        if(this.orderAux.toLowerCase() == 'asc'){
          this.orderAux = 'desc';
        }else{
          this.orderAux = 'asc';
        }
        
      }
    },
    computed: {
      list: function () {
        let order = this.orderAux,
          orderCol = this.orderAuxCol;

        order = order.toLowerCase();
        orderCol = parseInt(orderCol);

        if(order === 'asc'){
          this.items.sort(function (a, b) {
            if(a[orderCol] > b[orderCol]) {
              return 1
            }
            if(a[orderCol] < b[orderCol]) {
              return -1
            }
            return 0;
          });
        }else{
          this.items.sort(function (a, b) {
            if(a[orderCol] < b[orderCol]) {
              return 1
            }
            if(a[orderCol] > b[orderCol]) {
              return -1
            }
            return 0;
          });
        }

        
        if(this.search != ''){
          let search = this.search.toLowerCase();
          return this.items.filter(res => {
            for(var k =0; k < res.length; k++){
              if((res[k]+ "").toLowerCase().indexOf(search) >= 0){
                  return true;
              }
            }
            return false;
          });
        }
        return this.items;
      }
    }
};
</script>

<style>
</style>
