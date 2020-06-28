<?php
include_once '../partials/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <?php include_once '../partials/sidebar.php'; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Roles</h1>
            </div>

            <form action="" method="post" class="form-horizontal">
                <div id="alert" class="alert alert-success" style="display: none;">

                </div>

                <div class="form-group">
                    <label for="inputEmail">Name</label>
                    <input type="text" id="name" class="form-control" placeholder="Role Name" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block" id="button">Add Role</button>
                </div>
            </form>

            <h2>Roles</h2>

            <div class="table-responsive">
                <table class="table table-striped table-sm" id="datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<?php include '../partials/datatable.php'; ?>

<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            serverSide: true,
            ajax: 'http://php-ecommerce.sumon/backend/roles/json.php',
            pageLength: 5,
            buttons: [
                'csv', 'pdf', 'print'
            ]
        });
    });

    let button = document.getElementById('button');

    button.addEventListener('click', function (e) {
        e.preventDefault();

        const role_name = document.getElementById('name').value;

        let request = new XMLHttpRequest();
        request.open("POST", '<?php echo $site_url; ?>/roles/create.php', true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.onreadystatechange = function () {
            window.location.href = "<?php echo $site_url; ?>/roles/create.php";
        };

        request.send("name=" + role_name);
    });
</script>

<?php include_once '../partials/footer.php'; ?>
