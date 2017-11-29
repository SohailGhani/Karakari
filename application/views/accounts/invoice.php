<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'calibri';
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    @media print{
        #close{
            display:none
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?=site_url('assets/logo.png')?>" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                <b> Phone #: 042 37662912<br>
                                <?php//$sale['transactionDate']?></b>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information" >
                <td colspan="4" style="width: 100%; border: 2px solid black; border-radius: 15px;margin-bottom: 10px">
                    <table>
                        <tr>
                            <td><b>Invoice#<?=$sale['invoice']?>
                            </td>
                            
                            <td><b>Date: 
                                <?=$sale['transactionDate']?></b>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Payment Type: 
                                <?=$sale['depositMethod']?></b>
                            </td>
                            
                            <td><b>Customer: 
                                <?=$sale['name']?><br></b>
                                <?=$sale['address']?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
<!--            <tr class="heading">
                <td  style=" width: 30%">
                    Payment Method
                </td>
                
                <td colspan="2">
                    Check #
                </td>
            </tr>-->
            
<!--            <tr class="details">
                <td  style=" width: 30%">
                    <?=$sale['name']?>
                </td>
                
                <td colspan="2">
                    <?=$sale['paid']?>
                </td>
            </tr>-->
            
            <tr class="heading">
                <td>
                    Item
                </td>
                <td>
                    Per Price
                </td>
                <td>
                    Quantity
                </td>
                <td>
                    Price
                </td>
            </tr>
            <?php foreach($sale['itemNames'] as $item): ?>
            <tr class="item">
                <td>
                    <?=$item->itemName ?>
                </td>
                <td>
                    <?=$item->per_price ?>
                </td>
                <td>
                    <?=$item->quantity ?>
                </td>
                <td>
                    <?=$item->price ?>
                </td>
            </tr>
            <?php endforeach; ?>
            
            </table>
        
                    <table style="width: 150px; left: 600px;position: relative;">
                        <tr>
                            <td><b>Total Qty:</b></td><td><b><?=$sale['total']?></b></td>
                        </tr>
                        <tr>
                            <td><b>Discount:</b></td><td><b><?=$sale['discount']?></b></td>
                        </tr>
                        <tr>
                            <td><b>Balance</b></td><td><b><?=$sale['balance']?></b></td>
                        </tr>
                    </table>
                
    </div>
<center><a id="close" href="<?=site_url("accounts/transactions_info/$id")?>"> Close </a> </center>
</body>
</html>
