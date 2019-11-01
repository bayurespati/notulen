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
                editType: 'inline', //inline, modal, goTo
    		}
    	],

        nullable: ['secondary_contact'],

    	testArray: [ //only used if apiPath is 'insert api path here'
    		{
    			id: 1,
    			name: 'Kompeni Satu',
    			city: 'Jakarta',
    			address: 'Kau',
    			email: 'email@email.com',
    			primary_contact: '123456',
    			secondary_contact: null
    		},
            {
                id: 2,
                name: 'Kompeni Dua',
                city: 'Makassar',
                address: 'Yang',
                email: 'email1@email.com',
                primary_contact: '789123',
                secondary_contact: '322233'
            },
            {
                id: 3,
                name: 'Company One',
                city: 'Jakarta',
                address: 'Paling',
                email: 'email2@email.com',
                primary_contact: '456789',
                secondary_contact: null
            },
            {
                id: 4,
                name: 'Kompeni Tiga',
                city: 'Bandung',
                address: 'Sejiwa',
                email: 'email3@email.com',
                primary_contact: '654321',
                secondary_contact: '192837'
            },
    	],

    	initialSort: 'name',
    	apiPath: 'insert api path here',
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
