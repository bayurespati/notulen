import CompanyHeader from '../../../components/master/company/CompanyHeader.vue';
import PersonalisedTable from '../../../components/table/Table.vue';
import Pagination from '../../../components/global/Pagination.vue';

new Vue({

    el: '#company',

    data: {
    	tableColumns: [
    		{
    			name: 'nama',
    			recordable: true,
    			sortable: true,
    			nullable: false,
    			deleteMsg: true,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'kota',
    			recordable: true,
    			sortable: true,
    			nullable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'alamat',
    			recordable: true,
    			sortable: false,
    			nullable: false,
    			deleteMsg: false,
    			inputType: 'textArea',
    			inputValue: false
    		},
    		{
    			name: 'email',
    			recordable: true,
    			sortable: true,
    			nullable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'kontak_utama',
    			recordable: true,
    			sortable: false,
    			nullable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'kontak_sekunder',
    			recordable: true,
    			sortable: false,
    			nullable: false,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'aksi',
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
    			nama: 'David Bayu',
    			kota: 'Jakarta',
    			alamat: 'alamat',
    			email: 'email@email.com',
    			kontak_utama: '123456',
    			kontak_sekunder: ''
    		}
    	],

    	initialSort: 'nama',
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
