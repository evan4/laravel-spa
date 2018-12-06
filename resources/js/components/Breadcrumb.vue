<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-for="(item, index) in list" 
                v-bind:key="index"
                v-bind:class="defineClass(item.url)">
                <a 
                    v-if="item.url"
                    v-bind:href="item.url">{{item.title}}</a>
                <span
                    v-if="!item.url">{{item.title}}</span>
            </li>
        </ol>
    </nav>
</template>

<script>
export default {
    props: ['list'],
    computed:  {
        defineClass: function () {
            return (url) => {
                if(url){
                    return 'breadcrumb-item active';
                }else{
                    return 'breadcrumb-item';
                }
            }
            
        }
    }
}
</script>

<style>

</style>
