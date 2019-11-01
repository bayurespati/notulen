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
                                :error-message="errors[column.name]"
                                @set-input="rowContent[column.name] = $event"
                                @commence-edit="editRow">
                    </edit-input>
                    <!--E N D    O F   C O M P O N E N T   F O R   D I F F E R E N T   I N P U T   T Y P E S-->

                    <form-error v-if="errors[column.name]" :error="errors[column.name]">
                    </form-error>
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
    import FormError from '../global/FormError.vue';
    import EditInput from './EditInput.vue';

    export default {
        components: {
            FormError,
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

            apiPath: {
                type: String,
                default: ''
            },
        },

        data: function () {
            return {
                hasError: false,
                errors: {}
            };
        },

        computed: {
            rowContent(){
                let object = {};
                let vm = this;

                object['id'] = this.rowData.id;

                this.tableColumns.map(function (column) {
                    if (column.name !== 'aksi') {
                        object[column.name] = vm.rowData[column.name];
                    }
                });

                return object;
            },

            isInputAndDefaultTheSame(){
                let inputCount = 0;
                let defaultCount = 0;
                let vm = this;


                Object.keys(this.rowData).map(function (variable) {
                    defaultCount++;

                    if(vm.rowData[variable] === vm.rowContent[variable]){
                        inputCount++;
                    }
                });

                return inputCount === defaultCount;
            },

        },

        methods: {
            setToData(){
                this.$emit('set-to-data', 'data');
            },

            editRow(){
                // SIMULATE ERROR IN COMPANY LIST PAGE
                // const errorTest = {
                     // "name":["The name field is required.", "Test second error.", "Test third error."],
                     // "city":["The email field is required."],
                     // "address":["The password field is required."],
                     // "email":["The address field is required."],
                     // "primary_contact":["The current position field is required."],
                     // "secondary_contact":["The primary contact field is required."]
                // };

                // this.cleanErrors();
                // this.fillErrors(errorTest);

                //  COMMENT THE REST OF THIS METHOD TO SIMULATE ERROR IN COMPANY LIST PAGE

                const vm = this;

                if (this.isInputAndDefaultTheSame) {
                    this.setToData();
                } 
                else {
                    if(this.apiPath == 'insert api path here'){
                        const testUpdate = {
                            data: {
                                'content': this.rowContent,
                                'action': 'edit',
                                'type': 'success',
                                'msg': 'Entri telah berhasil diperbarui!'
                            }
                        }
                        vm.$emit('set-notification', testUpdate);
                        flash('Entri telah berhasil diperbarui');
                    }
                    else {
                        axios.patch('/api/' + this.apiPath + "/" + this.rowContent.id, this.rowContent)
                        .then(function (response) {
                            vm.$emit('set-notification', response);
                            flash('Entri telah berhasil diperbarui');
                        })
                        .catch(function (error) {
                            vm.cleanErrors();
                            vm.fillErrors(error.response.data);
                            flash('Ups, terjadi masalah!', 'danger');
                        });
                    }
                }
            },

            cleanErrors(){
                this.hasError = false;
                this.errors = {};
            },

            fillErrors(errorMessages){
                Object.keys(errorMessages).forEach(key => {
                    let message = "";

                    errorMessages[key].forEach(value => {
                        message = message + value + " ";
                    });

                    errorMessages[key] = message;
                });
                this.errors = errorMessages;
                this.hasError = true;
            },
        }
    };
</script>