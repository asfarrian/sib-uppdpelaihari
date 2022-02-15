<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="my-4 p-3 bg-light">

                <form method="POST" action="<?= site_url('Login/attempt') ?>">
                    <div>
                        <h4><i class="fa fa-key"></i>Silahkan Login</h4>
                        <h4 style="color: red;">
                            <?php
                                $info = $this->session->flashdata('info');
                                if(!empty($info)){
                                    echo $info;
                                }
                            ?>
                        </h4>
                        <hr />
                        <div class="input-group form-group">
                            <input
                                placeholder="Nomor Induk Pegawai"
                                name="nip"
                                required="required"
                                class="form-control"
                                type="text" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="form-control-feedback fa fa-user"></i></span>
                            </div>
                        </div>

                        <div class="input-group form-group">
                            <input
                                placeholder="Password"
                                required="required"
                                name="password"
                                class="form-control"
                                type="password" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="form-control-feedback fa fa-key"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-primary btn-block btn-md" type="submit">
                            <i class="load-indicator">
                                <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader>
                            </i>
                            Login <i class="fa fa-key"></i>
                        </button>
                    </div>

                    <hr />

                    <div class="text-center">
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
</div>

