<template>
    <div class="panel-heading row">
        <div class="col-md-6">
            Daftar Ruangan
        </div>
        <div class="col-md-6 row">
            <div class="col-md-6">
                <transition
                        enterActivaClass="fade-in"
                        leaveActiveClass="fade-out"
                        mode="out-in"
                >
                    <button v-if="!tambahFlag"
                            class="full-width btn btn-success btn-block btn-sm"
                            @click="tambahFlag = !tambahFlag">
                        <i class="icon icon-left s7-plus"></i> Tambah
                    </button>
                </transition>
            </div>
            <div class="col-md-6">
                <search-filter
                        @set-search="setSearch"
                >
                </search-filter>
            </div>
        </div>

        <add :tambah-flag="tambahFlag"
             :api-path="apiPath"
             @set-alert-flag="setAlertFlag"
             @set-tambah-flag="tambahFlag = $event"
        ></add>
    </div>
</template>

<script>
    import Add from './RoomAdd.vue';
    import SearchFilter from '../../global/Search.vue';

    export default {
        components: {
            Add, SearchFilter
        },

        props: {
            apiPath: {
                type: String,
                default: ''
            },
        },

        data: function () {
            return {
                tambahFlag: false,
            }
        },

        methods: {
            setSearch(value){
                this.$emit('set-search', value);
            },

            setAlertFlag(response){
                this.$emit('set-alert-flag', response)
            }
        }
    }
</script>