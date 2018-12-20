<template>
  <div class="card">
      <div v-if="title" v-bind:class="defineColor">
          {{ title }}
      </div>
      <div clasc="card-body">
          <slot></slot>
      </div>
  </div>
</template>

<script>
    export default {
       props: ['title', 'color'],
       computed: {
           defineColor: function () {
               return "card-header "+ (this.color || '');
           }
       }
    }
</script>

<style>
    .blue{
        color: #f7f7f7;
        background-color: #0d4a96; 
        border-color: #0d4a96;
    }
    .orange{
        color: #f7f7f7;
        background-color: #e86e0d; 
        border-color: #e86e0d;
    }
</style>

