<?php
include('SessionValidation.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Comparison</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* White background for the whole page */
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }

        form {
            width: 48%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #ff4d4d; /* Red background for header */
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #ffe6e6; /* Light red on row hover */
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .result-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .result {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 45%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s; /* Smooth scale effect on hover */
        }

        .result:hover {
            transform: scale(1.02); /* Scale effect on hover */
            border-color: #ff4d4d; /* Change border color on hover */
        }

        .result h3 {
            margin-top: 0;
            color: #333;
        }

        .result p {
            margin: 5px 0;
            color: #666;
        }

        .result a {
            text-decoration: none;
            color: #ff4d4d; /* Red color for links */
            font-weight: bold;
        }

        .result a:hover {
            text-decoration: underline; /* Underline on hover */
        }

        @media (max-width: 768px) {
            .form-container, .result-container {
                flex-direction: column;
                align-items: center;
            }

            form, .result {
                width: 100%;
                margin-bottom: 20px;
            }
        }

        .custom-alert-box {
            z-index: 1;
            width: 20%;
            height: 10%;
            position: fixed;
            bottom: 0;
            right: 0;
            left: auto;
        }

        .alert-box {
            display: none; /* Initially hidden */
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }

        .success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .failure {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .warning {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #faebcc;
        }
    </style>
</head>
<body>

    <div class="container">
       
    <div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
        <div class="form-container">
            <form action="" method="post">
                <table>
                    <tr>
                        <th>Brand</th>
                        <th>Phone</th>
                    </tr>
                    <tr>
                        <td>
                            <select name="sel_brand1" id="sel_brand1" onchange="getPhone(this.value, 1)">
                                <option value="">--Select--</option>
                                <?php
                                include('../Assets/Connection/Connection.php'); 
                                $selqry = "select * from tbl_company";
                                $res = $con->query($selqry);
                                while ($resdata = $res->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $resdata['company_id']?>"><?php echo $resdata["company_name"]?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="sel_phone1" id="sel_phone1" onchange="Search(this.value, 1)">
                                <option value="">--Select--</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>

            <form action="" method="post">
                <table>
                    <tr>
                        <th>Brand</th>
                        <th>Phone</th>
                    </tr>
                    <tr>
                        <td>
                            <select name="sel_brand2" id="sel_brand2" onchange="getPhone(this.value, 2)">
                                <option value="">--Select--</option>
                                <?php
                                $selqry = "select * from tbl_company";
                                $res = $con->query($selqry);
                                while ($resdata = $res->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $resdata['company_id']?>"><?php echo $resdata["company_name"]?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="sel_phone2" id="sel_phone2" onchange="Search(this.value, 2)">
                                <option value="">--Select--</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="result-container">
            <div class="result" id="result1">
                <?php
                $se = "select * from tbl_mobile";
                $data = $con->query($se);
                while ($row0 = $data->fetch_assoc()) {
                ?>
                <h3><?php echo $row0["mobile_name"]?></h3>
                <p>Price: <?php echo $row0["mobile_price"]?></p>
                <p>Model: <?php echo $row0["mobile_model"]?></p>
                <p><a href="javascript:void(0)" onclick="addCart(<?php echo $row0['mobile_id']?>)" > Buy</a></p>
                <?php
                }
                ?>
            </div>

            <div class="result" id="result2">
                <?php
                $se = "select * from tbl_mobile";
                $data = $con->query($se);
                while ($row0 = $data->fetch_assoc()) {
                ?>
                <h3><?php echo $row0["mobile_name"]?></h3>
                <p>Price: <?php echo $row0["mobile_price"]?></p>
                <p>Model: <?php echo $row0["mobile_model"]?></p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script src="../Assets/JQ/jQuery.js"></script>
    <script>
    function getPhone(did, formNumber) {
        $.ajax({
            url: "../Assets/Ajax/AjaxPhone.php?did=" + did,
            success: function(result) {
                $("#sel_phone" + formNumber).html(result);
            }
        });
    }

    function Search(mid, formNumber) {
        $.ajax({
            url: "../Assets/Ajax/AjaxSearch.php?mid=" + mid,
            success: function(result) {
                $("#result" + formNumber).html(result);
            }
        });
    }
    function addCart(id) {
    $.ajax({
        url: "../Assets/Ajax/AjaxAddCart.php?id=" + id,
        success: function(response) {
            console.log(response);

            if (response.trim() === "Added to Cart") {
                $(".success").fadeIn(300).delay(1500).fadeOut(400);
            } else if (response.trim() === "Already Added to Cart") {
                $(".warning").fadeIn(300).delay(1500).fadeOut(400);
            } else {
                $(".failure").fadeIn(300).delay(1500).fadeOut(400);
            }
        }
    });
}

    </script>

</body>
</html>