<template>
    <transition enterActiveClass="fade-in-down"
                leaveActiveClass="fade-out-up"
                mode="out-in"
    >
        <div v-if="tambahFlag" class="row mr-0 ml-0 mt-5 mb-4 pt-3 pb-3 bg-grey">
            <div class="col-sm-12 d-flex justify-content-center mb-5" >
                <span class="title">Tambah <strong class="font-weight-bold">Perusahaan </strong> Baru</span>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.name ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="company_title"
                           class="form-control-label panel-font-small">
                        Nama
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_title"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Nama Perusahaan"
                           v-model="perusahaanData.name"
                           @keyup.enter="addCompany"
                    >

                    <form-error v-if="errors.name"
                                :error="errors.name"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.city ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="company_city"
                           class="form-control-label panel-font-small">
                        Kota
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_city"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Kota Perusahaan"
                           v-model="perusahaanData.city"
                           @keyup.enter="addCompany"
                    >

                    <form-error v-if="errors.city"
                                :error="errors.city"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.address ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="company_address"
                           class="form-control-label panel-font-small">
                        Alamat
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_address"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Alamat Perusahaan"
                           v-model="perusahaanData.address"
                           @keyup.enter="addCompany"
                    >

                    <form-error v-if="errors.address"
                                :error="errors.address"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.email ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="company_email"
                           class="form-control-label panel-font-small">
                        Email
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_email"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Email Perusahaan"
                           v-model="perusahaanData.email"
                           @keyup.enter="addCompany"
                    >

                    <form-error v-if="errors.email"
                                :error="errors.email"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.primary_contact ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="company_primary_contact"
                           class="form-control-label panel-font-small">
                        Kontak Utama
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_primary_contact"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Kontak Utama Perusahaan"
                           v-model="perusahaanData.primary_contact"
                           @keyup.enter="addCompany"
                    >

                    <form-error v-if="errors.primary_contact"
                                :error="errors.primary_contact"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.secondary_contact ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="company_secondary_contact"
                           class="form-control-label panel-font-small">
                        Kontak Sekunder
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_secondary_contact"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Kontak Sekunder Perusahaan"
                           v-model="perusahaanData.secondary_contact"
                           @keyup.enter="addCompany"
                    >

                    <form-error v-if="errors.secondary_contact"
                                :error="errors.secondary_contact"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-4 offset-3 d-flex justify-content-around mt-3">
                <div class="col-sm-6">
                    <button class="full-width btn btn-success btn-block btn-sm"
                            @click="addCompany"
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
    import FormError from '../../global/FormError.vue';

    export default {
        components: {
          FormError
        },

        data: function () {
            return {
                perusahaanData: {
                    name: '',
                    city: '',
                    address: '',
                    email: '',
                    primary_contact: '',
                    secondary_contact: ''
                },
                errors: {}
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
            addCompany(){
                const vm = this;
                axios.post('/api/' + this.apiPath, this.perusahaanData)
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
                this.perusahaanData.name = '';
                this.perusahaanData.city = '';
                this.perusahaanData.address = '';
                this.perusahaanData.email = '';
                this.perusahaanData.primary_contact = '';
                this.perusahaanData.secondary_contact = '';

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