<template>
    <tr>
        <th v-for="column in tableColumns" :class="column.name == 'aksi' ? 'text-right' : ''">
            <span v-if="column.sortable === true"
                  class="icon"
                  @click="setSortKey(column.name)">
                <span v-if="sortBy === column.name" class="first-letter">
                    {{ column.columnName }}  <i class="icon-right s7-angle-down-circle"></i>
                </span>

                <span v-else class="first-letter">
                    {{ column.columnName }} <i class="icon-right s7-angle-down"></i>
                </span>
            </span>

            <span v-else class="first-letter">
                {{ column.columnName }}
            </span>
        </th>
    </tr>
</template>

<script>
    export default {
        props: {
            sortBy: {
                type: String,
                default: ''
            },
            tableColumns: {
                type: Array,
                default: function () {
                    return [];
                }
            }
        },

        methods: {
            setSortKey(value){
                this.$emit('set-sort-key', value);
            },
            // trimUnderscore(columnName){
                // return columnName.replace(/_/g,' ');
            // }
        }
    };
</script>

<style type="text/css">
    .first-letter {
        text-transform: capitalize;
    }
</style>