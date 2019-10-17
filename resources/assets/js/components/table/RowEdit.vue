<template>
    <tr class="bg-warning">
        <template v-for="column in tableColumns">
            <template v-if="column.name === 'aksi'">
                <td class="actions">
                    <span class="icon" @click="editRow"><i class="s7-diskette text-white font-weight-bold"></i></span>
                    <span class="icon" @click="setToData"><i class="s7-back text-white font-weight-bold"></i></span>
                </td>
            </template>

            <template v-else>
                <td :class="hasError ? 'td-align-top' : ''">

                    <!--S T A R T   C O M P O N E N T   F O R   D I F F E R E N T   I N P U T   T Y P E S-->
                    <edit-input :column="column"
                                :columnValue="rowData[column.name]"
                                :id="rowData.id"
                                @set-input="rowContent[column.name] = $event"
                                @set-file-name="file_name = $event"
                                @commence-edit="editRow">
                    </edit-input>
                    <!--E N D    O F   C O M P O N E N T   F O R   D I F F E R E N T   I N P U T   T Y P E S-->

                    <template v-if="column.nullable === false && column.recordable === true">
                        <form-error v-if="errors[column.name]"
                                    :error="errors[column.name]"
                        ></form-error>
                    </template>
                </td>
            </template>
        </template>
    </tr>
</template>

<style>
    .td-align-top{
        vertical-align: top !important;
        padding-bottom: 0;
    }
</style>

<script>
    import EditInput from './EditInput.vue';

    export default {
        components: {
            EditInput,
        },

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

        data: function () {
            return {
                hasError: false,
                file_name: null
            };
        },

        computed: {
            rowContent(){
                let object = {};
                let vm = this;

                object['id'] = this.rowData.id;

                this.tableColumns.map(function (column) {
                    if (column.recordable === true) {
                        object[column.name] = vm.rowData[column.name];
                    }
                });

                return object;
            },

            isInputAndDefaultTheSame(){
                let trueCount = 0;
                let varCount = 0;
                let vm = this;


                Object.keys(this.rowData).map(function (variable) {
                    varCount++;

                    if(vm.rowData[variable] === vm.rowContent[variable]){
                        trueCount++;
                    }
                });

                return trueCount === varCount;
            },

            cantBeNull(){
                let array = [];

                this.tableColumns.map(function (column) {
                    if (column.nullable === false && column.recordable === true) {
                        array.push(column.name);
                    }
                });

                return array;
            },

            errors(){
                let object = {};

                this.cantBeNull.map(function (column) {
                    object[column] = ''
                });

                return object;
            },
        },

        methods: {
            setToData(){
                this.$emit('set-to-data', 'data');
            },

            editRow(){
                const vm = this;

                this.rowContent['file_name'] = this.file_name;

                if (this.isInputAndDefaultTheSame) {
                    this.setToData();
                } else {
                    axios.patch('/api' + location.pathname + '/edit', this.rowContent)
                        .then(function (response) {
                            vm.$emit('set-notification', response);
                        })
                        .catch(function (error) {
                            vm.emptyErrorsState();
                            vm.setErrors(error.response.data);
                        });
                }
            },

            emptyErrorsState(){
                this.hasError = false;
                let vm = this;

                Object.keys(this.errors).map(function (variable) {
                    vm.errors[variable] = '';
                })
            },

            setErrors(errors){
                let vm = this;

                this.hasError = true;

                let keys = Object.keys(errors).map(function (key) {
                    return key;
                });

                keys.map(function (key) {
                    if (vm.cantBeNull.includes(key)) {
                        vm.errors[key] = vm.capitalise(key) + " harus diisi.";
                    } else {
                        vm.errors[key] = '';
                    }
                });
            },

            capitalise(string){
                return string.charAt(0).toUpperCase() + string.slice(1);
            },
        }
    };
</script>