import ItemView from '../../../../../components/master/item/item/ItemView.vue';
import ItemSize from '../../../../../components/master/item/item/ItemSize.vue';
import ItemStatus from '../../../../../components/master/item/item/ItemStatus.vue';
import Flash from '../../../../../components/global/Flash.vue';


new Vue({

    el: '#item-detail',

        data: {
    	tableColumns: [
    		{
    			name: 'code',
    			columnName: 'Kode',
    			sortable: true,
    			deleteMsg: true,
    			inputType: 'text',
    			inputValue: false
    		},
            {
                name: 'name',
                columnName: 'Nama',
                sortable: true,
                deleteMsg: true,
                inputType: 'text',
                inputValue: false
            },
            {
                name: 'alternative_name',
                columnName: 'Nama Alternatif',
                sortable: true,
                deleteMsg: false,
                inputType: 'text',
                inputValue: false
            },
            {
                name: 'type',
                columnName: 'Tipe',
                sortable: true,
                deleteMsg: false,
                inputType: 'select',
                inputValue: ['Kursi', 'Meja', 'Kabinet']
            },
            {
                name: 'detail_count',
                columnName: 'Detail',
                sortable: false,
                deleteMsg: false,
                inputType: 'select',
                inputValue: ['Dudukan', 'Sandaran', 'Kaki']
            },
    		{
    			name: 'aksi', //action column must have 'aksi' as the name
    			columnName: 'Aksi',
                editType: 'modal', //inline, modal
                modalName: 'editItemModal',
                extraGoToIcon: true,
                extraGoToIconName: 's7-photo',
                goToPath: 'details'
    		}
    	],

        typeArray: ['Kursi', 'Meja', 'Kabinet'],
        detailArray: ['Dudukan', 'Sandaran', 'Kaki'],
        finishingArray: ['Marmer Putih', 'Kayu', 'Besi'],

        testArray: [
        	{
        		id: 1,
        		code: '1001',
                name: 'Kursi Test',
                alternative_name: 'Kursi Test dengan beberapa detail tertentu',
                type: 'Kursi',
                detail: ['Sandaran', 'Dudukan', 'Kaki'],
                finishing: ['Marmer Putih'],
                detail_count: 3,
                finishing_count: 1
        	}
        ],

    	apiPath: 'insert api path here',
    },

    methods: {
    	
    },

    components: {
        ItemView,
        ItemSize,
        ItemStatus,
        Flash
    },
});
