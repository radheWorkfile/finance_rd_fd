<style>
    .table{
        border: 2px solid black;
        border-collapse: collapse;
    }
    .td{
        border: 1px solid black;
        text-align:center;
        padding:5px;
    }
    .th{
        border: 1px solid black;
        padding:5px;
        font-size:12px;
        text-align: center;
        font-family:Arial, Helvetica, sans-serif;
    }
    .tds{
        padding:8px;
        font-size:17px;
        font-family:Arial, Helvetica, sans-serif;
    }

    .h{
        text-align: center;
        font-family: serif;
        font-weight: 600;
    }

    .hs{
        text-align: center;
        font-family: serif;
        font-weight: 600;
        margin-top:-10px;
    }

    .head{

        font-weight:600;
        font-family:monospace;

    }
</style>
<?php foreach($getcmpny as $gcmp) { ?>
    <div class="card-body " style="background-image: linear-gradient(rgba(255,255,255,.7), rgba(255,255,255,.7)), url('<?php echo  base_url($gcmp['watermark']) ?>'); background-size: 500px; background-repeat: no-repeat; background-position:100px 320px;">
        <!-- <img src="<?php //echo base_url($gcmp['bill_header']); ?>" height="100px" width="100%"> -->
        <h1 class="h">FD Payment Bill</h1>
        <h4 class="hs"><?php echo $gcmp['company_address'] ?></h4>
        
        <table>
            <tr>
                <td class="tds" ><span class="head">CUST. NAME</span> <span style="font-size:16px;">: <?php echo $priemi['nm'] ?></span></td>
                <td class="tds"><span class="head">CUST. ID</span> : <?php echo $priemi['u_id'] ?></td>
            </tr>
            <tr>
                <td class="tds"><span class="head">BRANCH</span> : <?php echo $this->session->userdata('company_name') ?></td>
                <td class="tds"><span class="head">RECEIPT DATE</span> : <?php echo date('d-m-Y') ?></td>
            </tr>
            <tr>
                <td class="tds"><span class="head">RECEIPT NO.</span> : <?php echo $priemi['receipt_no'] ?></td>
                <td class="tds"><span class="head">FD NUMBER</span> : <?php echo $priemi['fd_no'] ?></td>
            </tr>
            <tr>
                <td class="tds"><span class="head">FD Plan</span> : <?php echo $priemi['pln_nm'] ?></td>
                <td class="tds"><span class="head">FD Duration</span> : <?php if ($priemi['interval'] == 1) {
                    echo $priemi['durtn'] . " Months";
                } elseif ($priemi['interval'] == 2) {
                    echo $priemi['durtn'] . " Years"; }  ?></td>
            </tr>
            <tr>
                <td class="tds"><span class="head">FREQUENCY</span> : Monthly</td>
                <td class="tds"><span class="head">Payment Date</span> : <?php echo date('d-m-Y',strtotime($priemi['payment_date'])) ?></td>
            </tr>
            <tr>
                <td class="tds"><span class="head">Paid Date</span> : <?php echo date('d-m-Y',strtotime($priemi['pay_date'])) ?></td>
            </tr>
        </table><br><br>
        <table class="table" style="width:100%;">
            <tr>
                <th class="th">AMOUNT</th>
                <?php if($priemi['plan_type'] == 1){?>
                    <!--<th class="th">Contribution Amount</th>-->
                <?php }else{ ?>
                    <!--<th class="th">Interest Percent</th>-->
                    <!--<th class="th">Interest Amount</th>-->
                <?php } ?>
                <th class="th">Penalty Amount</th>
                <th class="th">Paid Amount</th>
                <!--<th class="th">Total Amount</th>-->
            </tr>
            <tr>
                <td class="td"><?php echo $priemi['amt'] ?></td>
                <?php if($priemi['plan_type'] == 1){?>
                    <!--<td class="td"><?php echo $priemi['interest_percent'] ?></td>-->
                <?php }else{ ?>
                    <!--<td class="td"><?php echo $priemi['interest_percent'] . "%" ?></td>-->
                    <!--<td class="td"><?php echo $priemi['interest_amount'] ?></td>-->
                <?php } ?>                
                <td class="td"><?php if(!empty($priemi['penalty_amount'])) { echo $priemi['penalty_amount'];} else{ echo "0.00"; } ?></td>
                <td class="td"><?php echo $priemi['paid_amount']; ?></td>
                <!--<td class="td"><?php //if(!empty($priemi['penalty_amount'])) { echo ($priemi['paid_amount'] + $priemi['penalty_amount'] + $priemi['interest_amount']); } else{ echo $priemi['paid_amount'] + $priemi['interest_amount']; } ?></td>-->
            </tr>
        </table><br><br>

        <table class="table" style="width:100%;">
            <tr>
                <th class="th">RUPEES IN FIGURE</th>
                <th class="th">RUPEES IN WORDS</th>
            </tr>
            <tr>
                <td class="td">
                    <?php 
                        if(!empty($priemi['penalty_amount'])) { 
                            $pen = ($priemi['paid_amount'] + $priemi['penalty_amount'] + $priemi['interest_amount']); 
                        } else{ 
                             $pen = $priemi['paid_amount'] + $priemi['interest_amount']; 
                        } 
                        $rupee = $this->Admin_Common_model->getIndianCurrency($pen);
                        echo $rupee;
                        ?>
                    </td>
                <td class="td">
                    <?php
                        if(!empty($priemi['penalty_amount'])) { 
                            $val = $priemi['paid_amount'] + $priemi['penalty_amount'] + $priemi['interest_amount'];
                        } else{
                            $val = $priemi['paid_amount'] + $priemi['interest_amount'];
                        }
                       $rupee = $this->Admin_Common_model->getIndianCurrency($val);
                       echo $rupee;
                    ?>
                </td>
            </tr>
        </table>

        <div class="row" style="margin-top:140px;">
         <p><span style="margin-left:30px; font-weight:600;">CASH RECEIVED</span> <span style="margin-left:300px; font-weight:600;">AUTHORIZED SIGNATURE</span></p>
        </div>
    </div>
<?php } ?>