<template>
    <transition enterActiveClass="fade-in-down"
                leaveActiveClass="fade-out-up"
                mode="out-in"
    >
        <div v-if="tambahFlag" class="row mr-0 ml-0 mt-5 mb-4 pt-3 pb-3 bg-grey col-sm-12">
            <div class="col-sm-12 d-flex justify-content-center mb-5">
                <span class="title">Tambah <strong class="font-weight-bold">Barang </strong> Baru</span>
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

            <div class="col-sm-4 offset-3 d-flex justify-content-around mt-3">
                <div class="col-sm-6">
                    <button class="full-width btn btn-success btn-block btn-sm"
                            @click="addItem"
                    >
                        <i class="icon icon-left s7-plus"></i> Tambah
                    </button>
                </div>
                <div class="col-sm-6">
                    <button class="full-width btn btn-secondary btn-block btn-sm"
                            @click="setTambahFlag"
                    >
                        <i class="icon icon-left s7-check"></i> Selesai
                    </button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    import FormError from '../../../global/FormError.vue';
    import Multiselect from 'vue-multiselect'

    export default {
        components: {
          FormError,
          Multiselect
        },

        data: function () {
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

                typeArray: ['Kursi', 'Meja', 'Kabinet'],
                detailArray: ['Dudukan', 'Sandaran', 'Kaki'],
                finishingArray: ['Marmer Putih', 'Kayu', 'Besi'],
            }
        },

        props: {
            tambahFlag: {
                type: Boolean,
                default: false
            },

            apiPath: {
                type: String,
                default: ''
            },
        },

        methods: {
            addItem(){
                const vm = this;
                axios.post('/api/' + this.apiPath, this.itemData)
                .then(function (response) {
                    vm.$emit('set-alert-flag', [true, response]);
                    vm.resetForm();
                    flash('Entri telah berhasil ditambah!');
                })
                .catch(function (error) {
                    vm.cleanErrors();
                    vm.fillErrors(error.response.data.errors);
                    flash('Ups, terjadi masalah!', 'danger');
                })
            },

            resetForm(){
                this.itemData.name = '';
                this.itemData.code = '';
                this.itemData.alternative_name = '';
                this.itemData.type = '';
                this.itemData.detail.length = 0;
                this.itemData.finishing.length = 0;

                this.cleanErrors();
            },

            cleanErrors(){
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
            },

            setTambahFlag(){
                this.$emit('set-tambah-flag', false);
                this.resetForm();
            }
        }
    };
</script>