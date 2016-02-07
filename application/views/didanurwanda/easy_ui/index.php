<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>EasyUI Ajax Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/default/easyui.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/icon.css'); ?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.9.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.easyui.min.js'); ?>"></script>
    <style type="text/css">
        .fill 
        {
            background-color: #DFE8F6;
        }
        body
        {
            margin: 0;
            padding: 0;
            color: #555;
            font: normal 10pt Arial,Helvetica,sans-serif;
            background: #DFE8F6;
        }
        .header-view
        {
            padding-left: 10px;
            color: #555;
        }
    </style>
</head>
<body class="easyui-layout">

<!-- north -->
<div region="north" class="fill header-view" style="height: 100px" border="false" split="true">
    <h1>CodeIgniter EasyUI</h1>
    <h2>Implementasi Ajax Login pada CodeIgniter dan Easyui</h2>
</div>

<!-- west -->
<div region="west" class="fill" border="true" title="Navigation" style="width: 250px" split="true">
    <div class="easyui-accordion" fit="true" border="false" iconCls="icon-redo">
        <div title="Menu 1" iconCls="icon-reload">
            <ul class="easyui-tree">
                <li><a href="javascript:void(0)" id="log">Logout</a></li>
                <li>Child Menu 1</li>
                <li>Child Menu 2</li>
            </ul>
        </div>
        <div title="Menu 2" iconCls="icon-search">
            <ul class="easyui-tree">
                <li>Child Menu 1</li>
                <li>Child Menu 2</li>
                <li>Child Menu 3</li>
            </ul>
        </div>
        <div title="Menu 3" iconCls="icon-help">
            <ul class="easyui-tree">
                <li>Child Menu 1</li>
                <li>Child Menu 2</li>
                <li>Child Menu 3</li>
            </ul>
        </div>
    </div>
</div>

<!-- center -->
<div region="center" split="true" title="Main Content" id="content">

</div>

<!-- south -->
<div region="south" class="fill" style="height: 35px; padding: 5px;" split="true">
Copyright &copy; 2014 - Dida Nurwanda
</div>

<script type="text/javascript">
var AUTH_ID = '<?php echo $this->auth->get_id(); ?>';
jQuery(function($) {
    if(AUTH_ID == '') {
        show_login_view();
    } else {
        show_main_view();
    }
    
    $('#log').click(function() {
        if (AUTH_ID != '') {
            $.get('<?php echo site_url('didanurwanda/easy_ui/logout'); ?>', [], function(e) {
                show_login_view();
                AUTH_ID = '';
            });
        }
    });
});

function show_login_view() {
    $('#log').html('Login');
    $('#content').panel('refresh', '<?php echo site_url('didanurwanda/easy_ui/login'); ?>');
}
    
function show_main_view() {
    $('#log').html('Logout');
    $('#content').panel('refresh', '<?php echo site_url('didanurwanda/easy_ui/main'); ?>');
}
</script>

</body>
</html>