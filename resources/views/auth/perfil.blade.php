<div class="bg-secondary " id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Modificar usuario</h3>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" action="" method="post" novalidate>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputID" type="text" value="" placeholder="Enter your first name" disabled />
                                            <label for="inputFirstName">ID</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputUser" type="text" value="" placeholder="Enter your first name" disabled />
                                            <label for="inputUser">Nombre</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="user" id="inputEmail" type="text" value="" placeholder="email" disabled />
                                    <label for="inputEmail">Email</label>
                                </div>

                                <input type="checkbox" id="chbox" name="vehicle1" value="Contraseña">
                                <label for="chbox">Cambiar contraseña</label><br>

                                <div class="row mb-3" id="passwords">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPassword" name="pass" type="password" placeholder="Create a password" required />
                                            <label for="inputPassword">Nueva Contraseña</label>
                                            <div class="invalid-feedback text-danger">
                                                ¡Rellene la contraseña!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" value="" required />
                                            <label for="inputPasswordConfirm">Repita Nueva Contraseña</label>
                                            <div class="invalid-feedback text-danger">
                                                ¡Las contraseñas no coinciden!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0 d-flex justify-content-center">
                                        <input type="submit" id="registro" value="Modificar" name="submit" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3 mensaje">
                            <div><a href="index.php">Volver a inicio</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>