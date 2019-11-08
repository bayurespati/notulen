<template>
    <transition enterActiveClass="fade-in-down"
                leaveActiveClass="fade-out-up"
                mode="out-in"
    >
        <div v-if="tambahFlag" class="row mr-0 ml-0 mt-5 mb-4 pt-3 pb-3 bg-grey">
            <div class="col-sm-12 d-flex justify-content-center mb-5" >
                <span class="title">Tambah <strong class="font-weight-bold">User </strong> Baru</span>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.name ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="user_name"
                           class="form-control-label panel-font-small">
                        Nama
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="user_name"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Nama User"
                           v-model="userData.name"
                           @keyup.enter="addUser"
                    >

                    <form-error v-if="errors.name"
                                :error="errors.name"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.company ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="user_company"
                           class="form-control-label panel-font-small">
                        Perusahaan
                    </label>
                </div>
                <div class="col-sm-9">
                    <select v-model="userData.company"
                    @keyup.enter="addUser"
                    class="form-control form-control-xs custom-select">
                        <option value=""> Pilih Perusahaan </option>
                    	<template v-for="company in companyArray">
                   			<option :value="company">{{ company.name }}</option>
               			</template>
               		</select>

                    <form-error v-if="errors.company"
                                :error="errors.company"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.address ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="user_address"
                           class="form-control-label panel-font-small">
                        Alamat
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="user_address"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Alamat User"
                           v-model="userData.address"
                           @keyup.enter="addUser"
                    >

                    <form-error v-if="errors.address"
                                :error="errors.address"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.email ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="user_email"
                           class="form-control-label panel-font-small">
                        Email
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="user_email"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Email User"
                           v-model="userData.email"
                           @keyup.enter="addUser"
                    >

                    <form-error v-if="errors.email"
                                :error="errors.email"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.current_position ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="user_current_position"
                           class="form-control-label panel-font-small">
                        Jabatan
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="user_current_position"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Kontak Utama User"
                           v-model="userData.current_position"
                           @keyup.enter="addUser"
                    >

                    <form-error v-if="errors.current_position"
                                :error="errors.current_position"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.primary_contact ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="user_primary_contact"
                           class="form-control-label panel-font-small">
                        Kontak Utama
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="user_primary_contact"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Kontak Utama User"
                           v-model="userData.primary_contact"
                           @keyup.enter="addUser"
                    >

                    <form-error v-if="errors.primary_contact"
                                :error="errors.primary_contact"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.secondary_contact ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="user_secondary_contact"
                           class="form-control-label panel-font-small">
                        Kontak Sekunder
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="user_secondary_contact"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Kontak Sekunder User"
                           v-model="userData.secondary_contact"
                           @keyup.enter="addUser"
                    >

                    <form-error v-if="errors.secondary_contact"
                                :error="errors.secondary_contact"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.isActive ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="user_status"
                           class="form-control-label panel-font-small">
                        Status
                    </label>
                </div>
                <div class="col-sm-9 form-check mt-2 panel-font-small">
                	<label class="custom-control custom-radio">
                        <input type="radio"
                               name="radio-inline"
                               class="custom-control-input"
                               value="true"
                               v-model="userData.isActive">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Aktif</span>
                    </label>
                    <label class="custom-control custom-radio panel-font-small">
                        <input type="radio"
                               name="radio-inline"
                               class="custom-control-input"
                               value="false"
                               v-model="userData.isActive">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Nonaktif</span>
                    </label>

                    <form-error v-if="errors.isActive"
                                :error="errors.isActive"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group">
                <div class="col-sm-3 text-right">
                    <label for="user_password"
                           class="form-control-label panel-font-small">
                        Password (Auto-generated)
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="user_password"
                           type="text"
                           class="form-control form-control-sm"
                           disabled
                           v-model="password"
                           @keyup.enter="addUser"
                    >
                </div>
            </div>

            <div class="col-sm-4 offset-3 d-flex justify-content-around mt-3">
                <div class="col-sm-6">
                    <button class="full-width btn btn-success btn-block btn-sm"
                            @click="addUser"
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
                userData: {
                    name: '',
                    company: '',
                    address: '',
                    email: '',
                    current_position: '',
                    primary_contact: '',
                    secondary_contact: '',
                    isActive: true,
                },
                errors: {},
                companyArray: []
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

        watch: {
        	'userData.isActive': function (newValue, oldValue){
        		if(newValue == true || newValue == "true"){
        			this.userData.isActive = true;
        		}
        		else {
        			this.userData.isActive = false;
        		}
        	}
        },

        mounted() {
            this.getCompanies();
        },

        computed: {
        	password(){
        		return this.userData.name + 'NotulenApp';
        	},
        },

        methods: {
            getCompanies() {
                let vm = this;

                axios.get('/api/companies').then(response => {
                    vm.companyArray = response.data
                });
            },

            addUser(){
            	const sentData = {
                	name: this.userData.name,
                   	company: this.userData.company,
                   	address: this.userData.address,
                   	email: this.userData.email,
                   	current_position: this.userData.current_position,
                   	primary_contact: this.userData.primary_contact,
                   	secondary_contact: this.userData.secondary_contact,
                   	isActive: this.userData.isActive,
                   	password: this.password
               	}

                const vm = this;

                axios.post('/api/' + this.apiPath, sentData)
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
                this.userData.name = '';
                this.userData.company = '',
                this.userData.address = '',
                this.userData.email = '',
                this.userData.current_position = '',
                this.userData.primary_contact = '',
                this.userData.secondary_contact = '',
				this.userData.isActive = true,

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