import CompanyHeader from '../../../components/master/company/CompanyHeader.vue';
import Flash from '../../../components/global/Flash.vue';
import PersonalisedTable from '../../../components/table/Table.vue';
import Pagination from '../../../components/global/Pagination.vue';

new Vue({

    el: '#company',

    data: {
    	tableColumns: [
    		{
    			name: 'name',
                columnName: 'Nama',
    			sortable: true,
    			deleteMsg: true,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'city',
                columnName: 'Kota',
    			sortable: true,
    			deleteMsg: false,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'address',
                columnName: 'Alamat',
    			sortable: false,
    			deleteMsg: false,
    			inputType: 'textArea',
    			inputValue: false
    		},
    		{
    			name: 'email',
                columnName: 'Email',
    			sortable: true,
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
                editType: 'inline', //inline, modal
                extraGoToIcon: false,
    		}
    	],

        nullable: ['secondary_contact'],

    	initialSort: 'name',
    	apiPath: 'companies',
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
        Flash,
        PersonalisedTable,
        Pagination
    }
});
