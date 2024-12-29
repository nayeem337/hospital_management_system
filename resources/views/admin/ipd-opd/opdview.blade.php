<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referral and Consultation | Print</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .container {
            padding: 20px;
        }
        h2, h3, h4 {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        .header, .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            height: 95px;
        }
        .title {
            text-align: center;
        }
        .title h2, .title span {
            display: block;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="https://www.iutoic-dhaka.edu/uploads/img/1554797308.png" alt="Logo 1">
        <div class="title">
            <h2>Islamic University of Technology</h2>
            <span>University Medical Center</span>
        </div>
        <img src="https://www.iutoic-dhaka.edu/uploads/img/1601362099_1582.png" alt="Logo 2">
    </div>
    <div>
        <h3 style="text-align: center; border: 1px solid black; padding: 5px;">REFERRAL AND CONSULTATION</h3>
    </div>

    <div style="display: flex; justify-content: space-between;">
        <div>
            <h3 style="margin-bottom: -10px">Full Name of Patient: {{ $opdview->patient->name }}</h3>
            <h3 style="margin-bottom: -10px">ID card no/Designation: {{ $opdview->card_no }}</h3>
            <h3 style="margin-bottom: -10px">Mobile no:</h3>
            <h3 style="margin-bottom: -10px">Hospital Name: {{ $opdview->hospital_name }}</h3>
            <h3 style="margin-bottom: -10px">Diagnosis: {{ $opdview->diagnosis }}</h3>
        </div>
        <div>
            <h3>Date: {{ $opdview->date }}</h3>
            <h3>Sex:</h3>
            <h3>Age:</h3>
            <h3>Nationality:</h3>
        </div>
    </div>

    <table>
        <tr>
            <th>Immediate</th>
            <th>Urgent</th>
            <th>Elective</th>
        </tr>
        <tr>
            <td><input type="checkbox" {{ $opdview->immediate == "1" ? 'checked' : '' }}></td>
            <td><input type="checkbox" {{ $opdview->urgent == "1" ? 'checked' : '' }}></td>
            <td><input type="checkbox" {{ $opdview->elective == "1" ? 'checked' : '' }}></td>
        </tr>
    </table>

    <div>
        <h3>Complaints and duration: .........................</h3>

    </div>

    <div>
        <h3>Vital signs:</h3>
        <table>
            <tr>
                <th>Temp</th>
                <th>BP</th>
                <th>Pulse</th>
                <th>Resp Rate</th>
            </tr>
            <tr>
                <td>{{ $opdview->temp }}</td>
                <td>{{ $opdview->bp }}</td>
                <td>{{ $opdview->pulse }}</td>
                <td>{{ $opdview->resp_rate }}</td>
            </tr>
        </table>
    </div>

            <div>
                <h4>Clinical Examination:</h4>
                <p>{{ $opdview->clinical }}</p>
            </div>

            <div>
                <h4>Investigation:</h4>
                <p>{{ $opdview->investigation }}</p>
            </div>



            <div>
                <h4>Provisional Diagnosis:</h4>
                <p>{{ $opdview->provisional_diagnosis }}</p>
            </div>

            <div>
                <h4>Treatment given:</h4>
                <p>{{ $opdview->treatment_given }}</p>
            </div>



    <div>
        <h4>Reason of referral:</h4>
        <p>{{ $opdview->reason_of_referral }}</p>
    </div>

    <div class="footer">
        <div>Stamp and Signature of the Physician</div>
        <div style="margin-right: 150px;">Date:</div>
    </div>
</div>

<script>
    // Trigger print immediately when the page loads
    window.onload = function() {
        window.print();
    };
</script>
</body>
</html>
