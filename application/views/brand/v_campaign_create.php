<?
$ci =&get_instance();
?>
    <div class="row">
        <div class="large-12 columns">
            <div class="callout">
                <h3>Create Campaign</h3>
                <form method="post" action="<?=site_url('brand/campaign_create')?>">
                    <h5 style="color:red"><?if($this->session->userdata('create_error')){echo $this->session->userdata('create_error');$this->session->unset_userdata('create_error');}?></h5>
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
                            <input type='submit' class="button" value="Create">
                        </div>
                        <div class="medium-6 columns">
                            <a href="<?=site_url('brand/campaign_list')?>" class="button secondary">back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
