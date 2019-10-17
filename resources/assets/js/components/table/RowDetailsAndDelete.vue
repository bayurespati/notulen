<template>
    <tr>
        <template v-for="column in tableColumns">
            <template v-if="column.name === 'aksi'">
                <td class="actions">
                    <span class="icon" @click="deleteRow"><i class="s7-trash"></i></span>
                    <span class="icon" @click="setToEdit"><i class="s7-note"></i></span>
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

            count: {
                type: Number,
                default: 0
            }
        },

        computed: {},

        methods: {
            setToEdit() {
                this.$emit('set-to-edit', 'edit');
            },

            setToConfirm(){
                this.$emit('set-to-confirm', 'confirm');
            },

            deleteRow(){
                this.setToConfirm();
            }
        }
    };
</script>