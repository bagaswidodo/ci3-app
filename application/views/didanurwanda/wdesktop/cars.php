<div id="grid_cars" style="width: 100%; height: 100%;"></div>

<script type="text/javascript">
$(function () { 

    $().w2destroy('grid_cars');
    
    $('#grid_cars').w2grid({ 
        name: 'grid_cars', 
        header: 'List of Cars',
        bordered: true,
        url: '<?= site_url('didanurwanda/wdesktop/car_lists') ?>',
        method: 'GET', 
        show: { 
            toolbar: true,
            footer: true,
            toolbarAdd: true,
            toolbarDelete: true,
            toolbarEdit: true,
            lineNumbers: true
        }, 
        sortData: [{ field: 'recid', direction: 'DESC' }],
        columns: [                
            //{ field: 'recid', caption: 'ID', size: '50px', sortable: true, attr: 'align=center' },
            { field: 'Trademark', caption: 'Trademark',  sortable: true, size: '20%' },
            { field: 'Model', caption: 'Model',  sortable: true, size: '20%' },
            { field: 'Category', caption: 'Category',  sortable: true, size: '20%' },
            { field: 'TransmissSpeedCount', caption: 'Transmission Count', sortable: true, size: '20%'},
            { field: 'TransmissAutomatic', caption: 'Transmission Automatic', sortable: true, size: '20%' },
            { field: 'Liter', caption: 'Liter', sortable: true, size: '20%' }
        ],
        onAdd: function (event) {
            popupCars(null);
        },
        onEdit: function (event) {
            console.log(event)
            popupCars(event.recid);
        },
        onDelete: function (event, e) {
            if (e.status == 'success') {
                console.log('deleted ');
            }
        }
    });    

    // form
    function popupCars(id) {
        $().w2destroy('form_cars');

        $().w2form({
            name: 'form_cars',
            url: '<?= site_url('didanurwanda/wdesktop/car_form') ?>',
            style: 'border: 0',
            recid: id,
            fields: [
                //{ field: 'Trademark', type: 'text', required: true },
                { field: 'Model', type: 'list', required: true, 
                    options: {
                        items: <?= $models ?>
                    } 
                },
                { field: 'Category', type: 'list', required: true,
                    options: {
                        items: ['SALOON', 'SPORTS', 'TRUCK']
                    }
                },
                { field: 'TransmissSpeedCount', type: 'int', required: true },
                { field: 'TransmissAutomatic', type: 'list', required: true,
                    options: {
                        items: ["Yes", "No"]
                    }
                },
                { field: 'Liter', type: 'float', required: true }
            ],
            actions: {
                'Save' : function () {
                    if (this.validate())
                    {
                        this.save({}, function(data) {
                            if (data.status == 'success') {
                                this.wd.grid_cars.reload();
                                console.log(this.w2popup.close());
                            }
                        });
                    } 
                },
                'Reset' : function () { this.clear(); }
            }
        });
     
        $().w2popup('open', { 
            title   : 'Form in a Popup',
            body    : '<div id="form" style="width: 100%; height: 100%"></div>',
            style   : 'padding: 0',
            width   : 500,
            height  : 300, 
            showMax : true,
            onToggle: function (event) {
                $(wd.form_cars.box).hide();
                event.onComplete = function () {
                    $(wd.form_cars.box).show();
                    wd.form_cars.resize();
                }
            },
            onOpen: function (event) {
                event.onComplete = function () {
                    // specifying an onOpen handler instead is equivalent to specifying an onBeforeOpen handler, which would make this code execute too early and hence not deliver.
                    $('#wd-popup #form').w2render('form_cars');
                }
            }
        });
    }

});
</script>