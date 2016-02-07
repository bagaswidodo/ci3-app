<div style="padding: 13% 30%">
    <div class="easyui-panel fill" style="width: 450px; height: 200px;" title="Login" iconCls="icon-redo">
        <form id="form-login" method="post" style="padding: 20px;" novalidate onsubmit="return false">
            <div class="form-item">
                <label for="username">Username</label> 
                <br />
                <input type="text" name="username" class="easyui-validatebox" required="true" style="width: 100%" />
            </div>
            <div class="form-item">
                <label for="password">Password</label> 
                <br />
                <input type="password" name="password" class="easyui-validatebox" required="true" style="width: 100%" />
            </div>
            <div class="form-item">
                <br />
                <a id="submit-login" class="easyui-linkbutton" iconCls="icon-ok">Login</a>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $('#submit-login').click(function() {
        $.post('<?php echo site_url('didanurwanda/easy_ui/proses_login'); ?>', $('#form-login').serialize(), function(e) {
            if (e.success == true) {
                AUTH_ID = e.auth_id;
                show_main_view();
            }
        });
    });
</script>