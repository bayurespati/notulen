<template>


    <!--=========================================================================================
        M A K E   T H E   B A C K G R O U N D   C L I C K A B L E   T O   C L O S E   T H E
        M O D A L
        ==========================================================================================-->
    <div>


        <!--=========================================================================================
            M O D A L   W R A P P E R
            ==========================================================================================-->
        <div class="modal-container modal-effect-9"
             :class="hideOrShowModal">
            <div class="modal-content"
                 @click.stop>


                <!--=========================================================================================
                    M O D A L   H E A D E R
                    ==========================================================================================-->
                <div class="modal-header pb-2">


                    <!--=========================================================================================
                        C L O S E   M O D A L   B U T T O N
                        ==========================================================================================-->
                    <button @click="cancel"
                            aria-hidden="true" class="close modal-close"><span class="s7-close"></span>
                    </button>
                </div>


                <!--=========================================================================================
                    M O D A L   B O D Y
                    ==========================================================================================-->
                <div class="modal-body">


                    <!--=========================================================================================
                        M O D A L   C O N T E N T
                        ==========================================================================================-->
                    <div class="text-center">
                        <div class="row mr-0 ml-0 pt-3 pb-3 bg-grey">
                            <div class="col-sm-12 d-flex justify-content-center mb-5 mt-3" >
                                <h3 class="title">Ubah Data Barang <strong class="font-weight-bold">{{ editedData.name }} </strong></h3>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group"
                            :class="errors.code ? 'has-danger' : ''">
                                <div class="col-sm-3 text-right">
                                    <label for="item_code"
                                    class="form-control-label panel-font-small mb-0 mt-2">
                                        Kode
                                    </label>
                                </div>

                                <div class="col-sm-9">
                                    <input id="item_code"
                                    type="text"
                                    class="form-control form-control-sm"
                                    placeholder="Masukkan Kode Item"
                                    v-model="itemData.code"
                                    @keyup.enter="editItem"
                                    >

                                    <form-error v-if="errors.code"
                                    :error="errors.code"
                                    ></form-error>
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group"
                            :class="errors.name ? 'has-danger' : ''">
                                <div class="col-sm-3 text-right">
                                    <label for="item_name"
                                    class="form-control-label panel-font-small mb-0 mt-2">
                                        Nama
                                    </label>
                                </div>

                                <div class="col-sm-9">
                                    <input id="item_name"
                                    type="text"
                                    class="form-control form-control-sm"
                                    placeholder="Masukkan Nama Item"
                                    v-model="itemData.name"
                                    @keyup.enter="editItem"
                                    >

                                    <form-error v-if="errors.name"
                                    :error="errors.name"
                                    ></form-error>
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group"
                            :class="errors.alternative_name ? 'has-danger' : ''">
                                <div class="col-sm-3 text-right">
                                    <label for="item_alternative_name"
                                    class="form-control-label panel-font-small mb-0 mt-2">
                                        Nama Alternatif
                                    </label>
                                </div>

                                <div class="col-sm-9">
                                    <input id="item_alternative_name"
                                    type="text"
                                    class="form-control form-control-sm"
                                    placeholder="Masukkan Nama Alternatif Item"
                                    v-model="itemData.alternative_name"
                                    @keyup.enter="editItem">

                                    <form-error v-if="errors.alternative_name"
                                    :error="errors.alternative_name"
                                    ></form-error>
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group"
                            :class="errors.email ? 'has-danger' : ''">
                                <div class="col-sm-3 text-right">
                                    <label for="item_type"
                                    class="form-control-label panel-font-small mb-0 mt-2">
                                        Tipe
                                    </label>
                                </div>

                                <div class="col-sm-9">
                                    <select id="item_type"
                                    v-model="itemData.type"
                                    @keyup.enter="editItem"
                                    class="form-control form-control-xs custom-select">
                                        <template v-for="value in typeArray">
                                            <option :value="value">{{ value }}</option>
                                        </template>
                                    </select>

                                    <form-error v-if="errors.type"
                                    :error="errors.type"
                                    ></form-error>
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group"
                            :class="errors.detail ? 'has-danger' : ''">
                                <div class="col-sm-3 text-right">
                                    <label for="item_detail"
                                    class="form-control-label panel-font-small mb-0 mt-2">
                                        Detail
                                    </label>
                                </div>

                                <div class="col-sm-9">
                                    <multiselect
                                    v-model="itemData.detail"
                                    :options="detailArray"
                                    :multiple="true"
                                    :clear-on-select="false"
                                    :preserve-search="true"
                                    :select-label="'Tekan enter untuk memilih'"
                                    :selected-label="'Dipilih'"
                                    :deselect-label="'Tekan enter untuk menghapus'"
                                    placeholder="Pilih Detail">
                                    </multiselect>

                                    <form-error v-if="errors.detail"
                                    :error="errors.detail"
                                    ></form-error>
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group"
                            :class="errors.item_finishing ? 'has-danger' : ''">
                                <div class="col-sm-3 text-right">
                                    <label for="item_finishing"
                                    class="form-control-label panel-font-small mb-0 mt-2">
                                        Finishing
                                    </label>
                                </div>

                                <div class="col-sm-9">
                                    <multiselect
                                    v-model="itemData.finishing"
                                    :options="finishingArray"
                                    :multiple="true"
                                    :clear-on-select="false"
                                    :preserve-search="true"
                                    :select-label="'Tekan enter untuk memilih'"
                                    :selected-label="'Dipilih'"
                                    :deselect-label="'Tekan enter untuk menghapus'"
                                    placeholder="Pilih Finishing">
                                    </multiselect>

                                    <form-error v-if="errors.finishing"
                                    :error="errors.finishing"
                                    ></form-error>
                                </div>
                            </div>
                        </div>


                        <!--=========================================================================================
                            A C T I O N   B U T T O N S
                            ==========================================================================================-->
                        <div class="mt-3">


                            <!--=========================================================================================
                                C L O S E   M O D A L   B U T T O N
                                ==========================================================================================-->
                            <button class="btn btn-sm btn-space btn-secondary modal-close"
                                    @click="cancel">Batal
                            </button>


                            <!--=========================================================================================
                                C O N T I N U E   D E A C T I V A T I N G   T H E   U S E R
                                ==========================================================================================-->
                            <button class="btn btn-sm btn-space btn-success modal-close"
                                    :disabled="isInputAndDefaultTheSame"
                                    @click="editItem">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-overlay"
             :class="hideOrShowModal">
        </div>
    </div>
</template>

<script>
    import FormError from '../../../global/FormError.vue';
    import Multiselect from 'vue-multiselect'

    export default {

        components: {
          FormError,
          Multiselect
        },

        mounted: function () {
            document.addEventListener("keydown", (e) => {
                if (this.showModal && e.keyCode == 27) {
                    this.cancel();
                }
            });
        },

        props: {

            showModal: {
                type: Boolean,
                default: false
            },

            editedData: {
                type: Object,
                default: function () {
                    return {};
                }
            },

            typeArray: {
                type: Array,
                default: function () {
                    return [];
                }
            },

            detailArray: {
                type: Array,
                default: function () {
                    return [];
                }
            },

            finishingArray: {
                type: Array,
                default: function () {
                    return [];
                }
            },

            apiPath: {
                type: String,
                default: ""
            }

        },

        data(){
            return {
                itemData: {
                    id: '',
                    code: '',
                    name: '',
                    alternative_name: '',
                    type: '',
                    detail: [],
                    finishing: [],
                },
                errors: {},
            };
        },

        watch: {

            showModal(){
                if(this.showModal){
                    this.fillInputs();
                }
            },

        },

        computed: {

            hideOrShowModal(){
                return this.showModal ? 'modal-show' : '';
            },

            isInputAndDefaultTheSame(){
                let inputCount = 0;
                let defaultCount = 0;
                let vm = this;


                Object.keys(this.editedData).map(function (variable) {
                    defaultCount++;

                    if(vm.editedData[variable] === vm.itemData[variable]){
                        inputCount++;
                    }
                });

                return inputCount === defaultCount;
            },

        },

        methods: {

            fillInputs() {
                this.itemData.id = this.editedData.id;
                this.itemData.code = this.editedData.code;
                this.itemData.name = this.editedData.name;
                this.itemData.alternative_name = this.editedData.alternative_name;
                this.itemData.type = this.editedData.type;

                for (let i = 0; i < this.editedData.detail.length; i++) {
                    this.itemData.detail.push(this.editedData.detail[i]);
                }

                for (let i = 0; i < this.editedData.finishing.length; i++) {
                    this.itemData.finishing.push(this.editedData.finishing[i]);
                }
            },

            cancel(){
                this.$emit('set-show-edit-item-modal-to-false');
                this.cleanErrors();
                this.cleanInputs();
            },

            editItem(){
                const vm = this;

                if(this.apiPath == 'insert api path here'){
                    const testUpdate = {
                        data: {
                            'content': this.itemData,
                            'action': 'edit',
                            'type': 'success',
                            'msg': 'Entri telah berhasil diperbarui!'
                        }
                    }
                    this.$emit('set-alert-flag', [true, testUpdate]);
                    flash('Entri telah berhasil diperbarui');
                    this.cancel();
                }
                else {
                    axios.patch('/api/' + this.apiPath + "/" + this.itemData.id, this.itemData)
                    .then(function (response) {
                        vm.$emit('set-alert-flag', [true, response]);
                        flash('Entri telah berhasil diperbarui');
                        this.cancel();
                    })
                    .catch(function (error) {
                        vm.cleanErrors();
                        vm.fillErrors(error.response.data);
                        flash('Ups, terjadi masalah!', 'danger');
                    });
                }
            },

            cleanErrors(){
                this.hasError = false;
                this.errors = {};
            },

            cleanInputs(){
                this.itemData.id = '';
                this.itemData.code = '';
                this.itemData.name = '';
                this.itemData.alternative_name = '';
                this.itemData.type = '';
                this.itemData.detail.length = 0;
                this.itemData.finishing.length = 0;
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

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>