<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Inquries</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <?php include 'layout/header_linksn.php'; ?>

    <link rel="stylesheet" href="<?php echo base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css"); ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <?php include 'layout/top_nav.php'; ?>
    <?php include 'layout/left_side_navigationn.php'; ?>

        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Inquries List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>CDT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($inquries->result() as $inquiry){ ?>
                                        
                                                <tr>
                                                    <td><?php echo $inquiry->id; ?></td>
                                                    <td><?php echo $inquiry->name; ?></td>
                                                    <td><?php echo $inquiry->mobile; ?></td>
                                                    <td><?php echo $inquiry->email; ?></td>
                                                    <td><?php echo $inquiry->subject; ?></td>
                                                    <td><?php echo $inquiry->message; ?></td>
                                                    <td><?php echo $inquiry->c_dt; ?></td>
                                                </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>CDT</th>
                                        </tr>
                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
        </div>
        <?php include 'layout/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
    
    <?php include 'layout/footer_scriptsn.php'; ?>
    <script src="<?php echo base_url("assets/plugins/datatables/jquery.dataTables.js"); ?>"></script>
    <script src="<?php echo base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap-notify/bootstrap-notify.js"); ?> "></script>
    <script src="<?php echo base_url("assets/js/notie/notie.js"); ?> "></script>
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });

        function deleteCustomer(r){
            notie.confirm('Are you sure want to delete ...', 'Yes', 'Cancel', function() {
                var id=$(r).attr("href");
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url('common/temp_delete_by_ajax/'); ?>",
                    data:{"id":id,"table":"customer"},
                    success:function(data){
                        var res=data.trim();
                        if(res=="DONE"){
                           $(r).parent().parent().remove();
                           swal("Successful", "Deletion Successful");
                        }else{
                            swal("Successful", "Deletion Error"+res);
                        }
                    }
                });
            });
            return false;
        }

        
    </script>
</body>

</html>