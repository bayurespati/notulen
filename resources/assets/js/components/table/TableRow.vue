<template>
    <transition enterActiveClass="fade-in"
                leaveActiveClass="fade-out"
                mode="out-in"
    >
        <template v-if="displayFor === 'data'">
            <details-delete
                    :row-data="rowData"
                    :table-columns="tableColumns"
                    @show-modal="showModal"
                    @set-to-confirm="setDisplayFor"
                    @set-to-edit="setDisplayFor"
            ></details-delete>
        </template>


        <template v-else-if="displayFor === 'edit'">
            <edit
                    :row-data="rowData"
                    :table-columns="tableColumns"
                    :api-path="apiPath"
                    @set-to-data="setDisplayFor"
                    @set-notification="setNotification"
            ></edit>
        </template>


        <template v-else-if="displayFor === 'confirm'">
            <confirm-delete
                    :id="rowData.id"
                    :msg="deleteMessage"
                    :span="span"
                    :api-path="apiPath"
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
            },

            apiPath: {
                type: String,
                default: ''
            },
        },

        data: function () {
            return {
                displayFor: 'data',
                notificationMessage: '',
            }
        },

        computed: {
            deleteMessage(){
                let str = '';
                let columnCount = 0;
                let vm = this;

                this.tableColumns.map(function (column) {
                    if(column.deleteMsg === true){
                        columnCount++;

                        str += columnCount > 1
                            ? ', ' + vm.rowData[column.name]
                            : vm.rowData[column.name];
                    }
                });

                return 'Anda akan menghapus ' + str;
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

            showModal(modalName) {
                this.$emit('show-modal', [modalName, this.rowData]);
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