<template>
    <transition enterActiveClass="fade-in"
                leaveActiveClass="fade-out"
                mode="out-in"
    >
        <template v-if="displayFor === 'data'">
            <details-delete
                    :row-data="rowData"
                    :table-columns="tableColumns"
                    :count="count"
                    @set-to-confirm="setDisplayFor"
                    @set-to-edit="setDisplayFor"
            ></details-delete>
        </template>


        <template v-else-if="displayFor === 'edit'">
            <edit
                    :row-data="rowData"
                    :table-columns="tableColumns"
                    :count="count"
                    @set-to-data="setDisplayFor"
                    @set-notification="setNotification"
            ></edit>
        </template>


        <template v-else-if="displayFor === 'confirm'">
            <confirm-delete
                    :id="rowData.id"
                    :msg="deleteMessage"
                    :span="span"
                    @set-to-data="setDisplayFor"
                    @delete-from-root-array="editRootArray"
            ></confirm-delete>
        </template>


        <template v-else-if="displayFor === 'notification'">
            <notification
                    :message="notificationMessage"
                    :span="span"
            >
            </notification>
        </template>
    </transition>
</template>

<script>
    import DetailsDelete from './RowDetailsAndDelete.vue';
    import Edit from './RowEdit.vue';
    import ConfirmDelete from './RowConfirmDelete.vue';
    import Notification from './RowNotification.vue';

    export default {
        components: {
            DetailsDelete,
            Edit,
            ConfirmDelete,
            Notification
        },

        props: {
            rowData: {
                type: Object,
                default: function () {
                    return {}
                }
            },

            tableColumns: {
                type: Array,
                default: function () {
                    return []
                }
            },

            currentPage: {
                type: Number,
                default: 1
            },

            span: {
                type: Number,
                default: 0
            }
        },

        data: function () {
            return {
                displayFor: 'data',
                notificationMessage: '',
            }
        },

        computed: {
            count(){
                return Math.floor(Math.random() * (10));
            },

            deleteMessage(){
                let str = '';
                let count = 0;
                let vm = this;

                this.tableColumns.map(function (column) {
                    if(column.deleteMsg === true){
                        count++;

                        str += count > 1
                            ? ', ' + vm.rowData[column.name]
                            : vm.rowData[column.name];
                    }
                });

                return str + ' telah terhapus.';
            },
        },

        watch: {
            currentPage(){
                this.setDisplayFor('data');
            }
        },

        methods: {
            setDisplayFor(value){
                this.displayFor = value;
            },

            setNotification(response){
                this.notificationMessage = response.data.msg;

                this.setDisplayFor('notification');

                let vm = this;

                setTimeout(function () {
                    vm.setDisplayFor('data');

                    vm.editRootArray([response.data.action, response.data.content]);

                    vm.notificationMessage = '';
                }, 1200)
            },

            editRootArray(data){
                this.$emit('edit-root-array', data)
            }
        }
    }
</script>