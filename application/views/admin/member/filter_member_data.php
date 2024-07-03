<table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($reg as $re => $reges) { ?>
                                <tr>
                                    <td><?php echo $re +1 ?></td>
                                    <td><?php echo $reges['name'] ?></td>
                                    <td><?php echo $reges['mobile'] ?></td>
                                    <td><?php echo $reges['mail'] ?></td>
                                    <td>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_register_modal" onclick="view_register(<?php echo $reges['id'] ?>)" title='Click to View Register Data Details'><i class="fas fa-eye text-success"></i></a>&emsp;
                                        <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#update_register_modal" onclick="update_register(<?php echo $reges['id'] ?>)" title='Click to Update Register Data Details'><i class="fas fa-edit"></i></a>&emsp; -->
                                        <?php
                                        $status = ($reges['status'] == 1) ?
                                            "<a style='color:green' href='javascript:void()' onClick='return changeStatus(\"" . $reges['id'] . "\",\"0\",\"registration\",\"admin/common/chageStatus\")' title='Click to Di-Active Register Data'><b><i class='fa fa-check'></i> </b></a>"
                                            :
                                            "<a style='color:red'  href='javascript:void()'  onClick='return changeStatus(\"" . $reges['id'] . "\",\"1\",\"registration\",\"admin/common/chageStatus\")' title='Click to Active Register Data '><b><i class='fa fa-times'></i> </b></a>";
                                            echo "<span id=".$reges['id'].">".$status."</span>";
                                        ?>&emsp;
                                        <a href="javascript:void(0);" onclick="deletedata(<?php echo $reges['id'] ?>)" title='Click to Delete Register Data Details'><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>

    <script>
            
    </script>