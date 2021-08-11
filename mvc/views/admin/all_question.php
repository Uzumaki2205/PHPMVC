<h1 class="text-center">Question Manage</h1>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data['questions'] as $question) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $question['Title'] ?></td>
                        <td><?php echo $question['Description'] ?></td>
                        <td>
                            <form action="/PHPMVC/Admin/DeleteQuestion" method="POST">
                                <input type="hidden" name="id_question" value="<?php echo $question['Id'] ?>">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>