<div class="container">
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">Administrator Login</div>
      <div class="panel-body">
                      <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_open('warung/auth/cek_login'); ?>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?php echo $email; ?>">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Ingat Saya
              </label>
            </div>
            <a href="#">Lupa Password ?</a><br>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
      </div>
    </div>
  </div>
  <div class="col-md-2"></div>
</div>
</div>
