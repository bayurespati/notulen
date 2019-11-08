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
                editType: 'modal', //inline, modal
                modalName: 'editActiveUserModal',
                extraGoToIcon: false,
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
                editType: 'modal', //inline, modal
                modalName: 'editInactiveUserModal',
                extraGoToIcon: false,
    		}
    	],

    	editActiveUserModal: false,
    	editInactiveUserModal: false,

        nullable: ['company', 'secondary_contact'],

        companyArray:  ['Kompeni Satu', 'Kompeni Dua', 'Kompeni Tiga'],

    	initialSort: 'name',
    	apiPath: 'user',
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
