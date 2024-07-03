<style>
    /*@page {*/
    /*    size: 10.7cm 16.6cm;*/
    /*    margin: 5px;*/
    /*}*/
    
     @page {
        /*size: 8.46in 6.53in;*/
        /*size: 10.7cm 16.6cm; */
        size: 21cm 15cm;
        margin: 15px;
    }
    
    @media print{@page {size: landscape}}
</style>
<?php foreach ($getcmpny as $gcmp) { ?>

    <?php 
        if($page == 2){
            $width = '100%';
        }else{ 
            $width = '45%';
        } 
    ?>
    <table style="width:100%; font-size:13px;">
        <thead class="bd">
            <tr>
                <td><b>DATE</b></td>
                <td><b>RECEIPT </b></td>
                <!-- <td><b>PARTICULARS</b></td> -->
                <td><b>DR</b></td>
                <td><b>CR</b></td>
                <td><b>BAL</b></td>
            </tr>
            <tr>
                <td colspan="5">
                    <hr style="border: 1px dotted grey !important">
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            $balance = 0;
            foreach ($pri_pass as $pp => $pass) {
                ?>
                <?php
                $lst_id = $this->Admin_Rd_model->get_last_id($pass['user_id']);
                $sn = $pp + 1;
                // echo $line_no;die;
                if ($sn >= $from_serial_no && $sn <= $to_serial_no) {
                    $balance += (int) $pass['paid_amount'];
                    ?>
                    <tr>
                        <td>
                            <?php echo date('d/m/Y', strtotime($pass['pay_date'])); ?>
                        </td>
                        <td>
                            <?php echo $pass['receipt_no'] ?>
                        </td>
                        <!-- <td>Renewal Paid For RD</td> -->
                        <td>₹ 0.00/-</td>
                        <td>
                            <?php echo '₹ ' . number_format((int) $pass['paid_amount'], 2) . '/-' ?>
                        </td>
                        <td>
                            <?php echo '₹ ' . number_format($balance, 2) . '/-' ?>
                        </td>
                    </tr>
                <?php } else { ?>
                    <?php for ($i = 1; $i < $line_no; $i++) { ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <!--<td>&nbsp;</td>-->
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>