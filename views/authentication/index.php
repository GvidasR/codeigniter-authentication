<div class="content">
    <div class="row">
        <div class="background col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
            <h2>Please login</h2>
            <form action="<?php echo base_url(); ?>login" method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input name="email" type="email" class="form-control <?php echo form_error('email'); ?>" id="email" value="<?php echo set_value('email'); ?>" placeholder="Plase enter your email">
                    </div>
                    <div class="form-group">
                        <label for="passcode">Password</label>
                        <input name="passcode" type="password" class="form-control <?php echo form_error('passcode').form_error('check_login');?>" id="passcode" placeholder="Please enter your password">
                    </div>
                    <button class="btn btn-primary col-xs-6 col-xs-offset-3" type="submit">Prisijungti</button>
                </fieldset>
            </form>
         </div>
    </div>
</div>