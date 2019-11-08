<template>
    <tr>
        <template v-for="column in tableColumns">
            <template v-if="column.name === 'aksi'">
                <td class="actions text-right">
                    <span class="icon" @click="deleteRow"><i class="s7-trash"></i></span>
                    <span v-if="column.editType === 'inline'" 
                    class="icon" 
                    @click="setToEdit">
                        <i class="s7-note"></i>
                    </span>
                    <span v-else-if="column.editType === 'modal'" 
                    class="icon" 
                    @click="showModal(column.modalName)">
                        <i class="s7-note"></i>
                    </span>

                    <span v-if="column.extraGoToIcon"
                    class="icon"
                    @click="goTo(column.goToPath)">
                        <i :class="column.extraGoToIconName"></i>
                    </span>
                </td>
            </template>

            <template v-else>
                <td>
                    {{ rowData[column.name] }}
                </td>
            </template>
        </template>
    </tr>
</template>

<script>
    export default {
        components: {},

        props: {
            rowData: {
                type: Object,
                default: function () {
                    return {};
                }
            },

            tableColumns: {
                type: Array,
                default: function () {
                    return [];
                }
            },

            extraGoToIcon: {
                type: Boolean,
                default: false
            },

            extraGoToIconName: {
                type: String,
                default: ''
            },

            goToPath: {
                type: String,
                default: ''
            }
        },

        computed: {},

        methods: {
            setToEdit() {
                this.$emit('set-to-edit', 'edit');
            },

            showModal(modalName) {
                this.$emit('show-modal', modalName);
            },

            setToConfirm(){
                this.$emit('set-to-confirm', 'confirm');
            },

            goTo(path){
                window.location.href = location.pathname + '/' + path + '/' + this.rowData.id;
            },

            deleteRow(){
                this.setToConfirm();
            }
        }
    };
</script>