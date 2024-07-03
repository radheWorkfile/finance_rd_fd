<style>
    @page {
        size: A4;
        margin-top: 60% !important;
    }

    .table {
        border: 2px solid black;
        border-collapse: collapse;
    }

    .td {
        border: 1px solid black;
        text-align: center;
        padding: 5px;
    }

    .th {
        border: 1px solid black;
        padding: 5px;
        font-size: 12px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
    }

    .tds {
        padding: 8px;
        font-size: 17px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .h {
        text-align: center;
        font-family: serif;
        font-weight: 600;
    }

    .hs {
        text-align: center;
        font-family: serif;
        font-weight: 600;
        margin-top: -10px;
    }

    .head {

        font-weight: 600;
        font-family: monospace;

    }
</style>
<?php foreach ($getcmpny as $gcmp) { ?>
    <div class="card-body "
        style="background-image: linear-gradient(rgba(255,255,255,.7), rgba(255,255,255,.7)), url('<?php echo base_url($gcmp['watermark']) ?>'); background-size: 500px; background-repeat: no-repeat; background-position:100px 320px;">
        <h1 class="h">Recurring Deposit Bond</h1>

        <table class="table" style="width:100%;">
            <tr>
                <th class="th">Customer Name</th>
                <th class="th">Customer Full Address</th>
            </tr>
            <tr>
                <td class="td">
                    <?php echo $pribound['nm'] ?>
                </td>
                <td class="td">
                    <?php echo $pribound['permanent_address'] ?>
                </td>
            </tr>
        </table><br><br>

        <table class="table" style="width:100%;">
            <tr>
                <th class="th">Account No.</th>
                <th class="th">Membership No.</th>
                <th class="th">Branch Code</th>
                <th class="th">Branch Name</th>
            </tr>
            <tr>
                <td class="td">
                    <?php echo $pribound['account_no'] ?>
                </td>
                <td class="td">
                    <?php echo $pribound['u_id'] ?>
                </td>
                <td class="td">
                    <?php echo "101" ?>
                </td>
                <td class="td">
                    <?php echo $this->session->userdata('company_name') ?>
                </td>
            </tr>
        </table><br><br>

        <?php $i = 1; ?>
        <table class="table" style="width:100%;">
            <tr>
                <th class="th">Account Type</th>
                <th class="th">Duration</th>
                <th class="th">Account Opening Date</th>
                <th class="th">Maturity Date</th>
                <th class="th">ROI</th>
            </tr>
            <tr>
                <td class="td">
                    <?php echo $pribound['pln_nm'] ?>
                </td>
                <td class="td">
                    <?php if ($pribound['interval'] == 1) {
                        echo $pribound['durtn'] . " Months";
                    } elseif ($pribound['interval'] == 2) {
                        echo $pribound['durtn'] . " Years";
                    } ?>
                </td>
                <td class="td">
                    <?php echo date('d-m-Y',strtotime($pribound['rd_date'])) ?>
                </td>
                <td class="td">
                    <?php
                    if ($pribound['interval'] == 1) {
                        echo date('d-m-Y', strtotime($pribound['rd_date'] . $pribound['durtn'] . 'month'));
                    } elseif ($pribound['interval'] == 2) {
                        echo date('d-m-Y', strtotime($pribound['rd_date'] . $pribound['durtn'] . 'year'));
                    }
                    ?>
                </td>
                <td class="td">
                    <?php echo $pribound['interest_percent'] ?>
                </td>
            </tr>
        </table><br><br>

        <table class="table" style="width:100%;">
            <tr>
                <th class="th">No. of Installment</th>
                <th class="th">Installment Amount</th>
                <th class="th">Total Deposit Amount</th>
                <th class="th">Maturity Amount</th>
            </tr>
            <tr>
                <td class="td">
                    <?php echo $pribound['durtn'] ?>
                </td>
                <td class="td">
                    <?php echo $pribound['amt'] ?>
                </td>
                <td class="td">
                    <?php echo $sumamt['amount']; ?>
                </td>
                <td class="td">
                    <?php echo ($sumamt['amount'] + $sum_interestamt['interest_amount']); ?>
                </td>
            </tr>
        </table><br><br>

        <table class="table" style="width:100%;">
            <tr>
                <td class="th"><b>Total Desopit Amount (IN WORDS):</b>
                    <?php
                    $val = $sumamt['amount'];
                    $rupee = $this->Admin_Common_model->getIndianCurrency($val);
                    echo $rupee;
                    ?>
                </td>
            </tr>
        </table><br>
        <table class="table" style="width:100%;">
            <tr>
                <td class="th"><b>Total Maturity Amount (IN WORDS):</b>
                    <?php
                    $val = ($sumamt['amount'] + $sum_interestamt['interest_amount']);
                    $rupee = $this->Admin_Common_model->getIndianCurrency($val);
                    echo $rupee;
                    ?>
                </td>
            </tr>
        </table>

        <div class="row" style="margin-top:30px;">
            <p><span style="margin-left:30px; font-weight:600;">Branch Manager</span> <span
                    style="margin-left:300px; font-weight:600;">Customer Sign</span></p>
        </div>
    </div>
<?php } ?>