<template>
    <div class="panel-heading row">
        <div class="col-md-2">
            Daftar User
        </div>
        <div class="col-md-10 row">
            <div class="col-md-5">
                <div role="group" class="btn-group btn-group-justified force-color-white">
                    <a class="btn btn-dark"
                    :class="isActive ? 'active' : ''"
                    @click="setActiveFlag(true)">
                        <i class="icon icon-left s7-users"></i> Aktif
                    </a>
                    <a class="btn btn-dark"
                    :class="isActive ? '' : 'active'"
                    @click="setActiveFlag(false)">
                        <i class="icon icon-left s7-delete-user"></i> Nonaktif
                    </a>
                </div>   
            </div>
            <div class="col-md-3">
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
            <div class="col-md-4">
                <search-filter
                        @set-search="setSearch"
                >
                </search-filter>
            </div>
        </div>

        <add :tambah-flag="tambahFlag"
             :api-path="apiPath"
             :company-array="companyArray"
             @set-alert-flag="setAlertFlag"
             @set-tambah-flag="tambahFlag = $event"
        ></add>
    </div>
</template>

<script>
    import Add from './UserAdd.vue';
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

            isActive: {
                type: Boolean,
                default: true
            },

            companyArray: {
                type: Array,
                default: function () {
                    return [];
                }
            }
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

            setActiveFlag(state){
                this.$emit('set-active-state', state);
            },

            setAlertFlag(response) {
                this.$emit('set-alert-flag', response);
            },
        },
    };
</script>

<style scoped>
    .force-color-white a,
    .force-color-white a i {
        color: white !important;
    }
</style>