<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?= $this->include('admin/layout/sidebar'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?= $this->include('admin/layout/topbar'); ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Tables</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h5> Data  Menu</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table-artikel-query">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Kategori </th>
                                <th> Sub Kategori </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <script>
                var tabel = null;
                $(document).ready(function() {
                    tabel = $('#table-artikel-query').DataTable({
                        "processing": true,
                        "responsive": true,
                        "serverSide": true,
                        "ordering": true, // Set true agar bisa di sorting
                        "order": [
                            [0, 'asc']
                        ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
                        "ajax": {
                            "url": "<?= base_url('admin/data');?>",// URL file untuk proses select datanya
                            "type": "POST",
                            // csrf datatable
                            // "data": function(d) {
                            //     d.<?= csrf_token() ?> = hash;
                            // }
                        },
                        "deferRender": true,
                        "aLengthMenu": [
                            [5, 10, 50],
                            [5, 10, 50]
                        ], // Combobox Limit
                        "columns": [
                            {"data": 'id_kategori',"sortable": false, 
                                render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                }  
                            },
                            { "data": "nama_kategori" },  // Tampilkan kolom nama_kategori pada table kategori
                            { "data": "subkat" },  // Tampilkan kolom subkat pada table sub kategori
                            { "data": "id_kategori", // Tampilkan kolomid_kategori pada table kategori
                            "render": 
                                function( data, type, row, meta ) {
                                    return '<a href="show/'+data+'">Show</a>';
                                }
                            },
                        ],
                    });
                    // csrf datatable
                    // tabel.on('xhr.dt', function(e, settings, json, xhr) {
                    //     hash = json.<?= csrf_token() ?>;
                    //     $('#csrf_name_addusers').val(hash); // CSRF hash for add form
                    //     console.log(hash);
                    // });
                });
            </script>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?= $this->include('admin/layout/footer'); ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?= $this->endsection(); ?>