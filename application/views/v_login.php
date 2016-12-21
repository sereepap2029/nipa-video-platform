<div class="row align-center">
    <div class="column small-6">
        <h5>Brand login</h5>
        <form method="post" action="<?=site_url('login/brand')?>">
            <h5 style="color:red"><?if($this->session->userdata('login_error')){echo $this->session->userdata('login_error');$this->session->unset_userdata('login_error');}?></h5>
            <div class="row">
                <div class="medium-12 columns">
                    <label>Username
                        <input name="username" type="text" placeholder="Username">
                    </label>
                </div>
                <div class="medium-12 columns">
                    <label>Password
                        <input name="password" type="text" placeholder="password">
                    </label>
                </div>
                <div class="medium-6 columns">
                    <input type='submit' class="button" value="Login">
                </div>
                <div class="medium-6 columns">
                    <a href="<?=site_url('register/brand')?>" class="button secondary">register</a>
                </div>
            </div>
        </form>
    </div>
</div>
