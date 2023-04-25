<?php 

require_once "config.php";
require_once "site.php";

if(empty($_POST["amount"]) || $_POST["amount"] == 0) {
    die(json_encode(["status" => "Amount to be deposited is required."]));
}

if($_POST["method"] == "manualpay"){
    if(isset($_POST["manualpay"])){
        $manualpay = htmlspecialchars($_POST["manualpay"]);
        if($manualpay == "btc"){
            $response = [
                "status" => "success",
                "address" => $site["btc_address"]
            ];
        } else if($manualpay == "eth"){
            $response = [
                "status" => "success",
                "address" => $site["eth_address"]
            ];
        } else if($manualpay == "usdt"){
            $response = [
                "status" => "success",
                "address" => $site["usdt_address"]
            ];
        } else if($manualpay == "ltc"){
            $response = [
                "status" => "success",
                "address" => $site["ltc_address"]
            ];
        } else if($manualpay == "bnb"){
            $response = [
                "status" => "success",
                "address" => $site["bnb_address"]
            ];
        } else if($manualpay == "ada"){
            $response = [
                "status" => "success",
                "address" => $site["ada_address"]
            ];
        } else if($manualpay == "aave"){
            $response = [
                "status" => "success",
                "address" => $site["aave_address"]
            ];
        } else if($manualpay == "bch"){
            $response = [
                "status" => "success",
                "address" => $site["bch_address"]
            ];
        } else if($manualpay == "xlm"){
            $response = [
                "status" => "success",
                "address" => $site["xlm_address"]
            ];
        } else if($manualpay == "xmr"){
            $response = [
                "status" => "success",
                "address" => $site["xmr_address"]
            ];
        } else if($manualpay == "doge"){
            $response = [
                "status" => "success",
                "address" => $site["doge_address"]
            ];
        } else if($manualpay == "xrp"){
            $response = [
                "status" => "success",
                "address" => $site["xrp_address"]
            ];
        } else if($manualpay == "zec"){
            $response = [
                "status" => "success",
                "address" => $site["zec_address"]
            ];
        } else if($manualpay == "rvn"){
            $response = [
                "status" => "success",
                "address" => $site["rvn_address"]
            ];
        } else if($manualpay == "dash"){
            $response = [
                "status" => "success",
                "address" => $site["dash_address"]
            ];
        }
        echo json_encode($response);
    } else {
        die(json_encode(["status" => "Kindly select a payment method"]));
    }
} else {
    if(isset($_POST["bankpay"])){

        $type = htmlspecialchars($_POST["bankpay"]);

        $sql = "SELECT * FROM `bank_accounts` WHERE `type` = ? LIMIT 1";
        $bank = $conn->prepare($sql);
        $bank->bind_param("s", $type);
        $bank->execute();
        $bank = $bank->get_result();
        $bank = $bank->fetch_assoc();
        $response = [
            "status" => "success",
            "bank_name" => $bank["bank_name"],
            "acct_name" => $bank["acct_name"],
            "acct_number" => $bank["acct_number"],
            "swift_code" => $bank["swift_code"],
            "address" => $bank["address"],
        ];
        echo json_encode($response);
    } else {
        die(json_encode(["status" => "Kindly select a payment method"]));
    }
}



?>