<style>
    td {
        font-size: 15px;
        text-align: left;
        font-family: sans-serif;
        padding-bottom: 5px;
    }
    
    @page {
        /*size: 8.46in 6.53in;*/
        size: 21cm 15cm; 
        margin-left:700px;
    }
    
    @media print{@page {size: landscape}}
</style>

<table style="width:100%;">
    <tr>
        <td><b>Branch & Code:</b>&nbsp;
            <?php echo "021Godda" ?>
        </td>
    </tr>
    <tr>
        <td><b>DOC:</b>
            <?php echo date('d-m-Y') ?>
        </td>
    </tr>
    <tr>
        <td><b>Member Id:</b>
            <?php echo $pribound['user_id'] ?>
        </td>
    </tr>
    <tr>
        <td><b>Account No.:</b>&nbsp;
            <?php echo $pribound['account_no'] ?>
        </td>
    </tr>
    <tr>
        <td><b>Applicant Name:</b>&nbsp;
            <?php echo $pribound['nm'] ?>
        </td>
    </tr>
    <tr>
        <td><b>Nominee Name:</b>
            <?php echo $pribound['nimn_nm'] ?>
        </td>
    </tr>
    <tr>
        <td><b>Relationship:</b>
            <?php echo $pribound['relation'] ?>
        </td>
    </tr>
    <tr>
        <td colspan="2"><b>Address:</b>
            <?php echo $pribound['temp_add'] ?>
        </td>
    </tr>
    <tr>
        <td><b>State:</b>
            <?php echo $pribound['temporary_state'] ?>
        </td>
    </tr>
    <tr>
        <td><b>Pin Code:</b>
            <?php echo $pribound['temporary_pin'] ?>
        </td>
    </tr>
    <tr>
        <td><b>Scheme:</b>
            <?php echo $pribound['p_nm'] ?>
        </td>
    </tr>
    <tr>
        <td><b>Mode:</b>
            <?php if ($pribound['interval'] == 1) {
                echo " Months";
            } elseif ($pribound['interval'] == 2) {
                echo " Years";
            }
            ?>
        </td>
    </tr>
    <tr>
        <td><b>Installment Amount:</b>
            <?php echo $pribound['amount'] ?>
        </td>
    </tr>
    <tr>
        <td><b>Term:</b>
            <?php if ($pribound['interval'] == 1) {
                echo $pribound['duration'] . " Months";
            } elseif ($pribound['interval'] == 2) {
                echo $pribound['duration'] . " Years";
            }
            ?>
        </td>
    </tr>
    <tr>
        <td><b>Maturity Date:</b>
            <?php
            if ($pribound['interval'] == 1) {
                echo date('d-m-Y', strtotime($pribound['rd_date'] . $pribound['duration'] . 'month'));
            } elseif ($pribound['interval'] == 2) {
                echo date('d-m-Y', strtotime($pribound['rd_date'] . $pribound['duration'] . 'year'));
            }
            ?>
        </td>
    </tr>
    <tr>
        <td><b>Maturity Amount:</b>
            <?php echo ($sumamt['amount'] + $sum_interestamt['interest_amount']); ?>
        </td>
    </tr>
    <tr>
        <td><b>Collector Name:</b>
            <?php echo "IMBLL" . $pribound['agent_id'] ?> -
            <?php echo $pribound['agent_name'] ?>
        </td>
    </tr>
</table><br>

<div class="row">
    <p> <span style="margin-left: 50px; font-family: sans-serif; font-weight:500;">(Authorised Signatory)</span></p>
</div>