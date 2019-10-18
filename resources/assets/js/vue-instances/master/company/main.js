import CompanyHeader from '../../../components/master/company/CompanyHeader.vue';
import PersonalisedTable from '../../../components/table/Table.vue';
import Pagination from '../../../components/global/Pagination.vue';

new Vue({

    el: '#company',

    data: {
    	tableColumns: [
    		{
    			name: 'name',
                columnName: 'Nama',
    			recordable: true,
    			sortable: true,
    			nullable: false,
    			deleteMsg: true,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'city',
                columnName: 'Kota',
    			recordable: true,
    			sortable: true,
    			nullable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'address',
                columnName: 'Alamat',
    			recordable: true,
    			sortable: false,
    			nullable: false,
    			deleteMsg: false,
    			inputType: 'textArea',
    			inputValue: false
    		},
    		{
    			name: 'email',
                columnName: 'Email',
    			recordable: true,
    			sortable: true,
    			nullable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'primary_contact',
                columnName: 'Kontak Utama',
    			recordable: true,
    			sortable: false,
    			nullable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'secondary_contact',
                columnName: 'Kontak Sekunder',
    			recordable: true,
    			sortable: false,
    			nullable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'aksi',
                columnName: 'Aksi',
    			recordable: false,
    			sortable: false,
    			nullable: false,
    			deleteMsg: false,
    			inputType: false,
    			inputValue: false
    		}
    	],

    	testArray: [
    		{
    			id: 1,
    			name: 'David Bayu',
    			city: 'Jakarta',
    			address: 'alamat',
    			email: 'email@email.com',
    			primary_contact: '123456',
    			secondary_contact: ''
    		}
    	],

    	initialSort: 'name',
    	path: 'insert api path here',
    	searchKey: '',
    	alertData: [],

    	currentPage: 1,
    	perPage: 20,
    	totalResults: 0
    },

    methods: {
    	pageChanged(page){
    		this.currentPage = page;
    	},

    	setSearch(key){
    		this.searchKey = key;
    		this.pageChanged(1);
    	}
    },

    components: {
        CompanyHeader,
        PersonalisedTable,
        Pagination
    }
});
