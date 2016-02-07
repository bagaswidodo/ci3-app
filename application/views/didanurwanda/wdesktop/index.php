<!DOCTYPE html>
<html>
<head>
    <title>CodeIgniter 3 with W2-desktop</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url('assets/w2-desktop/w2-desktop-bittersweet.css') ?>" id="mainCSS" />  
    <script type="text/javascript" src="<?= base_url('assets/js/jquery-1.9.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/w2-desktop/w2-desktop.js') ?>"></script> 
    <style type="text/css">
        #x-content {
            width: 100%;
            height: 100%;
        }
        h2 {
            font: 400 18px/20px "helvetica neue", helvetica, arial, sans-serif; 
        }
    </style>
</head>
<body> 
    <div id="layout" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0"></div>

    <script type="text/javascript">
    $(function() {

        // layout
        var layout = $('#layout').w2layout({
            name: 'layout',  
            panels: [ 
                { type: 'top', style: 'padding: 5px 20px; color: #333', size: 60, content: '<h2>CRUD : CodeIgniter 3 & W2-desktop</h2>' },
                { type: 'left', size: 225, title: 'Navigation', resizable: true },
                { type: 'main', content: '<div id="maintabs" style="width: 100%"></div><div id="main-content" style="width: 100%; height: calc(100% - 35px); padding: 5px"></div>' }
            ]
        });

        // set left content
        wd['layout'].content('left', $().w2tree({

            name: 'tree',
            nodes: [ 
                { id: 'level-1', text: 'Main Menu', img: 'icon-folder', expanded: true, 
                    nodes: [
                       { id: 'dashboard', text: 'Dashboard', img: 'icon-leaf' },
                       { id: 'cars', text: 'Cars', img: 'icon-leaf' },
                       { id: 'models', text: 'Models', img: 'icon-leaf' },
                       { id: 'trademarks', text: 'Trademarks', img: 'icon-leaf' }
                    ]
                }
            ],
            onClick: function(event) {
            	if (event.node.id != 'level-1') {
                    addTab(event.node.id, event.node.text);
	            }
            }
        }));
        
        // onload dashboard
        getTabContent('dashboard');
 
 		// define tabs
		$('#maintabs').w2tabs({
        	name: 'maintabs',
	        active: 'dashboard',
	        tabs: [
	            { id: 'dashboard', caption: 'Dashboard' }
	        ],
	        onClick: function(event) {
                getTabContent(event.target);
	        }
        });

		// add and select tab 
		function addTab(id, title) {
			if (id != 'level-1')
			{

				if (wd.maintabs.get(id) === null)
		   	 	{
		   	 		wd.maintabs.add({ id: id, caption: title, closable: true });
		    	}
		    	wd.maintabs.select(id);
		    	wd.maintabs.refresh();
		    	wd.maintabs.click(id);
			
			}
		}

		function getTabContent(id) {
			// show loader
			$('#main-content').w2mask('Loading');
			
			$.get('<?= site_url() ?>/didanurwanda/wdesktop/'+ id, function(data) {
				$('#main-content').html(data);

				// unload
				$('#main-content').w2unmask();
			});
		}
     
    });

    </script>
</body>
</html>
