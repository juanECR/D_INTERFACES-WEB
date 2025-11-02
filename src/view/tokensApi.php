<!-- ==================================================== -->
<!-- Start right Content here -->
<!-- ==================================================== -->
<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-fluid">

        <!-- ========== Page Title Start ========== -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="mb-0">Tokens API</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Taplox</a></li>
                        <li class="breadcrumb-item active">Tokens API</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- buscador -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Filtrar
                </h5>
                <p class="card-subtitle">Depending on your browser and OS, you’ll see a slightly different style
                    of
                    feedback.</p>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label for="validationDefault01" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="validationDefault01" value="Mark"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">categoria</label>
                            <input type="text" class="form-control" id="validationDefault02" value="Otto"
                                required>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title">Todos los tokens</h4>

                            <a href="#!" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#AgregarToken">
                                <i class="bx bx-plus me-1"></i>Agregar Token
                            </a>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="AgregarToken" tabindex="-1"
                            aria-labelledby="AgregarTokenLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <form class="row g-3" id="frm_new_token">
                                                <div class="col-md-12">
                                                    <label for="tokenApi" class="form-label">Token</label>
                                                    <input type="text" class="form-control" id="tokenApi" name="tokenApi" required placeholder="xxxxxxxxxx-xxxx-12">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="descripcion" class="form-label">Descripción</label>
                                                    <textarea type="text" class="form-control" id="descripcion" name="descripcion" required> </textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary col-12" type="button" onclick="registrarToken();">Registrar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card body -->
                    <div class="table-responsive table-centered">
                        <table class="table mb-0" id="tbl_tokensApi">
                            <thead class="bg-light bg-opacity-50">
                                <tr>
                                    <th class="border-0 py-2">Token ID.</th>
                                    <th class="border-0 py-2">Fecha registro</th>
                                    <th class="border-0 py-2">Token</th>
                                    <th class="border-0 py-2">Descripción</th>
                                    <th class="border-0 py-2">Actions</th>
                                </tr>
                            </thead> <!-- end thead-->
                            <tbody id="tbody_tokensApi">
                                <tr>
                                    <td><a href="#!">#TZ5625</a></td>
                                    <td>29 April 2024</td>
                                    <td><a href="#!">Anna M. Hines</a></td>
                                    <td>(+1)-555-1564-261</td>                     
                                    <td><i class="bx bxs-circle text-success me-1"></i>Completed</td>
                                </tr>
                                <tr>
                                    <td><a href="#!">#TZ9652</a></td>
                                    <td>25 April 2024</td>
                                    <td><a href="#!">Judith H. Fritsche</a></td>
                                    <td>(+57)-305-5579-759</td>                     
                                    <td><i class="bx bxs-circle text-success me-1"></i>Completed</td>
                                </tr>
                                <tr>
                                    <td><a href="#!">#TZ5984</a></td>
                                    <td>25 April 2024</td>
                                    <td><a href="#!">Peter T. Smith</a></td>
                                    <td>(+33)-655-5187-93</td>
                                    <td><i class="bx bxs-circle text-success me-1"></i>Completed</td>
                                </tr>
                            </tbody> <!-- end tbody -->
                        </table> <!-- end table -->
                    </div> <!-- table responsive -->
                    <div
                        class="align-items-center justify-content-between row g-0 text-center text-sm-start p-3 border-top">
                        <div class="col-sm">
                            <div class="text-muted">
                                Showing <span class="fw-semibold">5</span> of <span
                                    class="fw-semibold">90,521</span> orders
                            </div>
                        </div>
                        <div class="col-sm-auto mt-3 mt-sm-0">
                            <ul class="pagination pagination-rounded m-0">
                                <li class="page-item">
                                    <a href="#" class="page-link"><i class='bx bx-left-arrow-alt'></i></a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">3</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link"><i class='bx bx-right-arrow-alt'></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div>
    <!-- End Container Fluid -->
    <script src="<?php echo BASE_URL; ?>src/view/js/tokensApi.js"></script>