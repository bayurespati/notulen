import UserHeader from '../../../components/master/user/UserHeader.vue';
import Flash from '../../../components/global/Flash.vue';
import PersonalisedTable from '../../../components/master/user/UserTable.vue';
import Pagination from '../../../components/global/Pagination.vue';
import editActiveUserModal from '../../../components/master/user/EditActiveUserModal.vue';
import editInactiveUserModal from '../../../components/master/user/EditInactiveUserModal.vue';


new Vue({

    el: '#user',

    data: {
    	activeTableColumns: [
    		{
    			name: 'name',
                columnName: 'Nama',
    			sortable: true,
    			deleteMsg: true,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'company',
                columnName: 'Perusahaan',
    			sortable: true,
    			deleteMsg: false,
    			inputType: 'select',
    			inputValue: ['Kompeni Satu', 'Kompeni Dua', 'Kompeni Tiga']
    		},
    		{
    			name: 'email',
                columnName: 'Email',
    			sortable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'address',
                columnName: 'Alamat',
    			sortable: true,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'current_position',
                columnName: 'Jabatan',
    			sortable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'primary_contact',
                columnName: 'Kontak Utama',
    			sortable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'secondary_contact',
                columnName: 'Kontak Sekunder',
    			sortable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'aksi', //action column must have 'aksi' as the name
                columnName: 'Aksi',
                editType: 'modal', //inline, modal, goTo
                modalName: 'editActiveUserModal'
    		}
    	],

    	inactiveTableColumns: [
    		{
    			name: 'name',
                columnName: 'Nama',
    			sortable: true,
    			deleteMsg: true,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'email',
                columnName: 'Email',
    			sortable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'address',
                columnName: 'Alamat',
    			sortable: true,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'current_position',
                columnName: 'Jabatan',
    			sortable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'primary_contact',
                columnName: 'Kontak Utama',
    			sortable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'secondary_contact',
                columnName: 'Kontak Sekunder',
    			sortable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'aksi', //action column must have 'aksi' as the name
                columnName: 'Aksi',
                editType: 'modal', //inline, modal, goTo
                modalName: 'editInactiveUserModal'
    		}
    	],

    	editActiveUserModal: false,
    	editInactiveUserModal: false,

        nullable: ['company', 'secondary_contact'],

        companyArray:  ['Kompeni Satu', 'Kompeni Dua', 'Kompeni Tiga'],

    	testArray: [ //only used if apiPath is 'insert api path here'
    		{
    			id: 1,
    			name: 'User Pertama',
    			email: 'pertama@pertama.com',
    			address: 'Alamat Pertama',
    			current_position: 'Desainer',
    			primary_contact: '123456789',
    			secondary_contact: null,
    			company: 'Kompeni Satu',
    			isActive: true
    		},
    		{
    			id: 2,
    			name: 'User Kedua',
    			email: 'kedua@kedua.com',
    			address: 'Alamat Kedua',
    			current_position: 'Ketua',
    			primary_contact: '23414432423',
    			secondary_contact: '321343234',
    			company: null,
    			isActive: false
    		},
    		{
    			id: 3,
    			name: 'User Ketiga',
    			email: 'ketiga@ketiga.com',
    			address: 'Alamat Ketiga',
    			current_position: 'Kepala',
    			primary_contact: '2198360128763',
    			secondary_contact: null,
    			company: 'Kompeni Kedua',
    			isActive: true
    		},
    		{
    			id: 4,
    			name: 'User Keempat',
    			email: 'keempat@keempat.com',
    			address: 'Alamat Keempat',
    			current_position: 'Kepala Geng',
    			primary_contact: '2382137123',
    			secondary_contact: '213123123',
    			company: null,
    			isActive: false
    		},
    		{
    			id: 5,
    			name: 'User Kelima',
    			email: 'kelima@kelima.com',
    			address: 'Alamat Kelima',
    			current_position: 'Anggota Pengawas',
    			primary_contact: '127621637213',
    			secondary_contact: '1231273',
    			company: null,
    			isActive: false
    		},
    		{
    			id: 6,
    			name: 'User Keenam',
    			email: 'keenam@keenam.com',
    			address: 'Alamat Keenam',
    			current_position: 'Pengawas Pemakan Segala',
    			primary_contact: '121231241332',
    			secondary_contact: '23123123',
    			company: 'Kompeni Satu',
    			isActive: true
    		},
    		{
    			id: 7,
    			name: 'User Ketujuh',
    			email: 'ketujuh@ketujuh.com',
    			address: 'Alamat Ketujuh',
    			current_position: 'Penyanyi',
    			primary_contact: '12131241513',
    			secondary_contact: null,
    			company: 'Kompeni Tiga',
    			isActive: true
    		},
    		{
    			id: 8,
    			name: 'User Kedelepan',
    			email: 'kedelepan@kedelapan',
    			address: 'Alamat Kedelepan',
    			current_position: 'Drummer',
    			primary_contact: '23124133123123',
    			secondary_contact: null,
    			company: 'Kompeni Dua',
    			isActive: true
    		},
    		{
    			id: 9,
    			name: 'User Kesembilan',
    			email: 'kesembilan@kesembilan',
    			address: 'Alamat Kesembilan',
    			current_position: 'Gitaris',
    			primary_contact: '3126317254',
    			secondary_contact: '21936918264',
    			company: null,
    			isActive: false
    		},
    	],

    	initialSort: 'name',
    	apiPath: 'insert api path here',
    	searchKey: '',
    	alertData: [],

    	isActive: true,

    	currentPage: 1,
    	perPage: 20,
    	totalResults: 0,

    	editedData: {
    		id: '',
    		name: '' ,
    		email: '',
    		address: '',
   			current_position: '',
   			primary_contact: '',
   			secondary_contact: '',
   			company: '', 
   			isActive: '',
    	},
    },

    methods: {
    	pageChanged(page){
    		this.currentPage = page;
    	},

    	setSearch(key){
    		this.searchKey = key;
    		this.pageChanged(1);
    	},

    	setActiveFlag(state){
    		this.isActive = state;
    		this.pageChanged(1);
    	},

    	showModal(data){
    		if(this.activeTableColumns[7].modalName == data[0]){
    			this.editActiveUserModal = true;
    		}else{
    			this.editInactiveUserModal = true;
    		}

    		this.fillsEditedData(data[1]);
    	},

    	hideEditActiveUserModal(){
    		this.editActiveUserModal = false;
    		this.emptyEditedData();
    	},

    	hideEditInactiveUserModal(){
    		this.editInactiveUserModal = false
    		this.emptyEditedData();
    	},

    	fillsEditedData(data){
    		this.editedData.id = data.id;
    		this.editedData.name = data.name;
    		this.editedData.email = data.email;
    		this.editedData.address = data.address;
   			this.editedData.current_position = data.current_position;
   			this.editedData.primary_contact = data.primary_contact;
   			this.editedData.secondary_contact = data.secondary_contact;
   			this.editedData.isActive = data.isActive;
   			this.editedData.company = data.company;
    	},

    	emptyEditedData(){
			this.editedData.id = '';
    		this.editedData.name = '';
    		this.editedData.email = '';
    		this.editedData.address = '';
   			this.editedData.current_position = '';
   			this.editedData.primary_contact = '';
   			this.editedData.secondary_contact = '';
   			this.editedData.company = '';
   			this.editedData.isActive = '';
    	}
    },

    components: {
    	UserHeader,
    	Flash,
    	PersonalisedTable,
    	Pagination,
    	editActiveUserModal,
    	editInactiveUserModal
    },
});
