<template>
    <div>
      <div class="d-flex justify-content-between">
        
        <a v-if="create && !modal" v-bind:href="create">Create</a>
        <modallink
           v-if="create && modal"
            type="link"
            name="add"
            title="Create"
            css="">
        </modallink>
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
            <td v-for="i in item">{{i | formatData }}</td>
           
            <td  v-if="details || edit || deleted ">
                <form 
                v-bind:id="index"
                v-if="details && token" method="post" v-bind:action="deleted + item.id" >
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" v-bind:value="token">

                    <a v-if="details && !modal" v-bind:href="details">Details |</a>
                    <modallink
                      v-if="details && modal"
                        v-bind:item="item"
                        v-bind:url="details"
                        type="link"
                        name="details"
                        title=" Details |"
                        css="">
                    </modallink>

                    <a v-if="edited && !modal" v-bind:href="edit">Edit</a> |
                    <modallink
                      v-if="edited && modal"
                        v-bind:item="item"
                        v-bind:url="edited"
                        type="link"
                        name="edit"
                        title=" Edit |"
                        modal="sim"
                        css="">
                    </modallink>
                    <a href="#" 
                      v-on:click="executeForm(index)">Delete</a>
                </form>

                <span v-if="!token">
                  <a v-if="details" v-bind:href="details">Details</a> |
                  <a v-if="edited && !modal" v-bind:href="edit">Edit</a> |
                    <modallink
                      v-if="edited && modal"
                        v-bind:item="item"
                        v-bind:url="edited"
                        type="link"
                        name="edit"
                        title=" Edit |"
                        css="">
                    </modallink>
                  <a v-if="deleted" v-bind:href="deleted">Delete</a>
                </span>
                <span v-if="token && !details">
                    <a v-if="details && !modal" v-bind:href="details">Details</a> |
                    <modallink
                      v-if="details && modal"
                        v-bind:item="item"
                        v-bind:url="details"
                        type="link"
                        name="details"
                        title=" Details |"
                        css="">
                    </modallink>

                    <a v-if="edited && !modal" v-bind:href="edit">Edit</a>
                    <modallink
                      v-if="edited && modal"
                        v-bind:item="item"
                        v-bind:url="edited"
                        type="link"
                        name="edit"
                        title=" Edit"
                        css="">
                    </modallink>
                </span>
            </td>
          </tr>
        </tbody>

      </table>
    </div>
</template>

<script>
export default {
    props: ['titles', 'items', 'order', 'orderCol',  "create", "details", "edited", 
    "deleted", "token", 'modal'],
    data: function () {
      return {
        search: '',
        orderAux: this.order || 'asc',
        orderAuxCol: this.orderCol || 0
      }
    },
    methods:{
      executeForm: function (index) {
        console.log(index);
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
    filters: {
      formatData: function (value) {
        if(!value) return '';
        value = value.toString();

        if (value.split('-').length == 3) {
          value = value.split('-');
          return value[2] + '/' + value[1] + '/' + value[0];
        }
        return value;
       }
    },
    computed: {
      list: function () {
        let list = this.items.data,
          order = this.orderAux,
          orderCol = this.orderAuxCol;

        order = order.toLowerCase();
        orderCol = parseInt(orderCol);

        if(order === 'asc'){
          list.sort(function (a, b) {
            if(Object.values(a)[orderCol] > Object.values(b)[orderCol]) {
              return 1
            }
            if(Object.values(a)[orderCol] < Object.values(b)[orderCol]) {
              return -1
            }
            return 0;
          });
        }else{
          list.sort(function (a, b) {
            if(Object.values(a)[orderCol] < Object.values(b)[orderCol]) {
              return 1
            }
            if(Object.values(a)[orderCol] > Object.values(b)[orderCol]) {
              return -1
            }
            return 0;
          });
        }

        if(this.search){
          let search = this.search.toLowerCase();
          return this.items.filter(res => {
            res = Object.values(res);
            for(var k =0; k < res.length; k++){
              if((res[k]+ "").toLowerCase().indexOf(search) >= 0){
                  return true;
              }
            }
            return false;
          });
        }
        return list;
      }
    }
};
</script>

<style>
</style>
