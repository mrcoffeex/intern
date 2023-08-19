<!-- modals -->

<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header m-2">
                <h5 class="modal-title" id="exampleModalLabel"><?= $projectName ?> | Login</h5>
                <a href="#" data-dismiss="modal" aria-label="Close"><i class="icon-times"></i></a>
            </div>
            <div class="modal-body m-2">
                <form action="config/auth" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.loginAccount)">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Your Email</label>
                                <input 
                                type="email" 
                                class="form-control" 
                                name="userEmail" 
                                id="userEmail" 
                                maxlength="50" 
                                value="<?= @$email ?>" 
                                autofocus required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Your Password</label>
                                <input 
                                type="password" 
                                class="form-control" 
                                name="userPassword" 
                                id="userPassword" 
                                maxlength="20" 
                                required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group float-right">
                                <a href="forgotPassword">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button 
                                type="submit" 
                                id="loginAccount" 
                                class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                New to InternBuilders? Register <a href="student">Student</a> / <a href="business">Business</a> / <a href="school">School</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>