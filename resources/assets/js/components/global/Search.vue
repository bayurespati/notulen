<template>
    <input type="search" id="cari" name="cari" class="form-control form-control-sm" placeholder="Cari" v-model="searchKey">
</template>

<script>
    export default {
        data() {
            return {
                searchKey: ''
            }
        },

        watch: {
            searchKey() {
                this.$emit('set-search', this.searchKey);
            }
        }
    };
</script>
