<style>
    td{
        font-size:10px;
        text-align: left;
        font-family: sans-serif;
        padding-bottom:5px;
    }
    @page {
        size: 10.7cm 16.6cm;
        margin: 5px;
    }
</style>

<table style="width:100%;">
    <tr>
        <td><b>Branch & Code:</b>&nbsp; <?php echo "021Godda" ?></td>
        <td><b>DOC:</b> <?php echo date('Y-m-d') ?></td>
    </tr>
    <tr>
        <td><b>Account No.:</b>&nbsp; <?php echo $pribound['account_no'] ?></td>
    </tr>
    <tr>
        <td><b>Applicant Name:</b>&nbsp; <?php echo $pribound['nm'] ?></td>
    </tr>
    <tr>
        <td><b>Nominee Name:</b> <?php echo $pribound['nimn_nm'] ?></td>
        <td><b>Relationship:</b> <?php echo $pribound['relation'] ?></td>
    </tr>
    <tr>
        <td colspan="2"><b>Address:</b> <?php echo $pribound['temp_add'] ?></td>
    </tr>
    <tr>
        <td><b>State:</b> <?php echo $pribound['temporary_state'] ?></td>
        <td><b>Pin Code:</b> <?php echo $pribound['temporary_pin'] ?></td>
    </tr>
    <tr>
        <td><b>Scheme:</b> <?php echo $pribound['p_nm'] ?></td>
        <td><b>Mode:</b> <?php if ($pribound['interval'] == 1) {
                echo " Months";
            } elseif ($pribound['interval'] == 2) {
                echo " Years"; }  
            ?></td>
    </tr>
    <tr>
        <td><b>Installment Amount:</b> <?php echo $pribound['amount'] ?></td>
        <td><b>Term:</b> 
            <?php if ($pribound['interval'] == 1) {
                echo $pribound['duration'] . " Months";
            } elseif ($pribound['interval'] == 2) {
                echo $pribound['duration'] . " Years"; }  
            ?>
        </td>
    </tr>
    <tr>
        <td><b>Maturity Date:</b>
            <?php 
                if($pribound['interval'] == 1) {
                    echo date('Y-m-d', strtotime($pribound['rd_date'] . $pribound['duration'] . 'month'));
                } elseif($pribound['interval'] == 2) {
                echo date('Y-m-d', strtotime($pribound['rd_date'] . $pribound['duration'] . 'year'));
                }
            ?>
        </td>
        <td><b>Maturity Amount:</b> <?php echo ($sumamt['amount'] + $sum_interestamt['interest_amount']); ?></td>
    </tr>
    <tr>
        <td colspan="2"><b>Collector Name:</b><?php echo "IMBLL".$pribound['agent_id'] ?> - <?php echo $pribound['agent_name'] ?></td>
    </tr>
</table><br>

<div class="row">
    <p> <span style="margin-left: 215px; font-family: sans-serif; font-weight:500;">(Authorised Signatory)</span></p>
</div>