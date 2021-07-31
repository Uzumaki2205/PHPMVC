<h1 class="text-center">Report Manage</h1>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">MSSV</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Point</th>
                    <th scope="col">EXACT</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data['reports'] as $result) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $result['Mssv'] ?></td>
                        <td><?php echo $result['Name'] ?></td>
                        <td><?php echo $result['Email'] ?></td>
                        <td><?php echo $result['Point'] ?></td>
                        <td><?php echo $result['Final_Result'] ?></td>
                        <td>
                            <form method="POST" action="/PHPMVC/Admin/DeleteReport">
                                <input type="hidden" name="id_report" value="<?php echo $result['Id'] ?>">
                                <button name="delete" type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>