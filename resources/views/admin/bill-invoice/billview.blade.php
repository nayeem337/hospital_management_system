<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Reimbursement Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid black;
        }

        h1, h2 {
            text-align: center;
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 5px;
            text-align: left;
            vertical-align: top;
        }

        .header, .footer {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }

        .signature {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }

        .signature div {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <p>ORGANISATION OF ISLAMIC COOPERATION (OIC)</p>
        <p>ISLAMIC UNIVERSITY OF TECHNOLOGY (IUT)</p>
        <p>DHĀKA, BANGLADESH</p>
    </div>
    <h2>REQUEST FOR RE-IMBURSEMENT OF MEDICAL EXPENSES</h2>
    <p><strong>Date:</strong> 6/11/23</p>

    <table>
        <tr>
            <th>PARTICULARS OF EXPENSES</th>
            <th>PAYMENT DOCUMENT SERIALS</th>
            <th>TAKA</th>
        </tr>
        <tr>
            <td>1. Consultation fees</td>
            <td id="consultation-value">{{$billview->consulation_tk}}</td>
            <td id="consultation-amount">{{$billview->consulation_tk}}</td>
        </tr>
        <tr>
            <td>2. Medicines</td>
            <td id="medicine-value">{{$billview->medicine}}</td>
            <td id="medicine-amount">{{$billview->medicine_tk}}</td>
        </tr>
        <tr>
            <td>3. Laboratory / Clinical Test</td>
            <td id="lab-value">{{$billview->lab_tk}}</td>
            <td id="lab-amount">{{$billview->lab_tk}}</td>
        </tr>
        <tr>
            <td>4. Hospital / Clinic bills</td>
            <td id="hospital-value">{{$billview->hospital_tk}}</td>
            <td id="hospital-amount">{{$billview->hospital_tk}}</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right;"><strong>Total:</strong></td>
            <td id="total-amount"></td>
        </tr>
    </table>

    <p><strong>Name:</strong> </p>
    <p><strong>Position / Student No.:</strong> </p>
    <p><strong>Dept./Office:</strong> </p>
    <p><strong>Bank A/C No.:</strong> </p>

    <h2>OFFICIAL USE ONLY</h2>

    <table>
        <tr>
            <th>Gross payable amount</th>
            <td>Taka</td>
        </tr>
        <tr>
            <th>Less: Deduction @ 10% as per rule</th>
            <td></td>
        </tr>
        <tr>
            <th>Recommended for payment =&gt;</th>
            <td></td>
        </tr>
    </table>

    <div class="signature">
        <div>
            <p>Checked</p>
            <p>ACCOUNTS OFFICER</p>
            <p>Signature: ___________</p>
            <p>Date: ___________</p>
        </div>
        <div>
            <p>RECOMMENDED</p>
            <p>COMPTROLLER</p>
            <p>Signature: ___________</p>
            <p>Date: ___________</p>
        </div>
    </div>
</div>

<script>
    // Function to calculate the total value
    function calculateTotal() {
        // Get values for each category
        const consultation = parseFloat(document.getElementById('consultation-amount').textContent) || 0;
        const medicine = parseFloat(document.getElementById('medicine-amount').textContent) || 0;
        const lab = parseFloat(document.getElementById('lab-amount').textContent) || 0;
        const hospital = parseFloat(document.getElementById('hospital-amount').textContent) || 0;

        // Calculate the total
        const total = consultation + medicine + lab + hospital;

        // Display the total
        document.getElementById('total-amount').textContent = total.toFixed(2);
    }

    // Trigger calculation on page load
    window.onload = function() {
        calculateTotal();
        window.print();
    };
</script>
</body>
</html>
