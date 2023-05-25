<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Emi Calulator</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <form>
            <h1>Emi Calculator</h1>
            <div class="row">
                <div class="col-md-6">
                    <label for="purchaseprice">Purchase Price</label>
                    <input type="text" class="form-control numberonly" id="purchaseprice" placeholder="Purchase Price..." required>
                </div>
                <div class="col-md-6">
                    <label for="donpayment">Down Payment</label>
                    <input type="text" class="form-control numberonly" id="donpayment" placeholder="Down Payment..." required value="0">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="repaymenttime">Repayent Time(in months)</label>
                    <input type="text" class="form-control" id="repaymenttime" placeholder="Re Payment Time..." required>
                </div>
                <div class="col-md-6">
                    <label for="interstrate">Interest Rate(%)</label>
                    <input type="text" class="form-control numberonly" id="interstrate" placeholder="Interest Rate..." required>
                </div>
            </div>
            <button type="button" id="calculate_button" class="btn btn-primary mt-2">Calcuate Emi</button>
        </form>
    </div>
    
</body>
<script type="text/javascript">
    $(document).ready(function () { 
            $('.numberonly').keypress(function (e) {    
                var charCode = (e.which) ? e.which : event.keyCode    
                if (String.fromCharCode(charCode).match(/[^0-9]/g))    
                    return false;                        
            });    
        });   

    $('#calculate_button').on('click', function(e) {
        e.preventDefault();
        //Fetch data
        var purchasePrice = $('#purchaseprice').val();
        var downPayment = $('#donpayment').val();
        var repaymentTime = $('#repaymenttime').val();
        var interestRate = $('#interstrate').val();

        //validate
        if(purchasePrice == '' || downPayment =='' || repaymentTime == '' || interestRate == '') {
            alert(`Purchase Price is required.
                Down Payment is required.
                Repyment Time is required.
                Interest Rate is reqired.`);
        }
        
        //Vaidte purcahse payment and Down Payment
        if(purchasePrice < downPayment) {
            alert('Down Payment cannot be greater than Purchase Price.')
        }

        //Fetch Actual Amount on which we have to pay Emi
        var actualEmiableAmount = (purchasePrice - downPayment);
        var interestApplied = (actualEmiableAmount * (interestRate * 0.01)) / repaymentTime;
        var monthlyPayment = ((actualEmiableAmount / repaymentTime) + interestApplied).toFixed(2);

        alert("Monthly EMi is "+ monthlyPayment)
    });
</script>
</html>