<template>
    <span>
        <span v-if="item">
             <button 
                v-if="!type || (type != 'button' &&  type != 'link' )"
                v-on:click="fillForm()"
                type="button" v-bind:class="css || 'btn  btn-primary'" 
                data-toggle="modal" 
                v-bind:data-target="'#' + name">
                {{title}}
            </button>
            <button 
                v-if="type == 'button'"
                v-on:click="fillForm()"
                type="button" 
                v-bind:class="css || 'btn  btn-primary'" 
                data-toggle="modal" 
                v-bind:data-target="'#' + name">
                {{title}}
            </button>
            <a v-if="type == 'link'"
                v-on:click="fillForm()"
                href="#" 
                data-toggle="modal" 
                v-bind:class="css || ''"
                v-bind:data-target="'#' + name">{{title}}
            </a>
        </span>
        <span v-if="!item">
            <button 
                v-if="!type || (type != 'button' &&  type != 'link' )"
                type="button" v-bind:class="css || 'btn  btn-primary'" 
                data-toggle="modal" 
                v-bind:data-target="'#' + name">
                {{title}}
            </button>
            <button 
                v-if="type == 'button'"
                type="button" 
                v-bind:class="css || 'btn  btn-primary'" 
                data-toggle="modal" 
                v-bind:data-target="'#' + name">
                {{title}}
            </button>
            <a v-if="type == 'link'"
                href="#" 
                data-toggle="modal" 
                v-bind:class="css || ''"
                v-bind:data-target="'#' + name">{{title}}
            </a>
        </span>
    </span>
</template>

<script>
export default {
    props: ['type', 'name', 'title', 'css', 'item'],
    methods: {
        fillForm: function () {
            this.$store.commit('setItem', this.item);
        }
    }
}
</script>

<style>

</style>
